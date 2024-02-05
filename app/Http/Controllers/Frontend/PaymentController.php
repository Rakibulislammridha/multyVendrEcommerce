<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaypalSetting;
use App\Models\Product;
use App\Models\StripeSetting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index(){

        if (!Session::has('address')) {
            return redirect()->route('user.checkout');
        };
        
        return view('frontend.pages.payment');
    }

    public function paymentSuccess()
    {
        return view('frontend.pages.payment-success');
    }

    /** Order details store **/
    public function storeOrder($paymentMethod, $paymentStatus, $transactionId, $paidAmount, $paidCurrencyName)
    {
        $setting = GeneralSetting::first();
        $order = new Order();

        $order->invoice_id = rand(1, 999999);
        $order->user_id = Auth::user()->id;
        $order->sub_total = getCartTotal();
        $order->amount = getFinalPayableAmount();
        $order->currency_name = $setting->currency_name;
        $order->currency_icon = $setting->currency_icon;
        $order->product_qty = \Cart::content()->count();
        $order->payment_method = $paymentMethod;
        $order->payment_status = $paymentStatus;
        $order->order_address = json_encode(Session::get('address'));
        $order->shipping_method = json_encode(Session::get('shipping_method'));
        $order->coupon = json_encode(Session::get('coupon'));
        $order->order_status = 'pending';
        $order->save();

        /** Ordered products store **/
        foreach(\Cart::content() as $item){

            $product = Product::find($item->id);
            
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->vendor_id = $product->vendor_id;
            $orderProduct->product_name = $product->name;
            $orderProduct->variants = json_encode($item->options->variants);
            $orderProduct->variant_total = $item->options->variants_total;
            $orderProduct->unit_price = $item->price;
            $orderProduct->qty = $item->qty;
            $orderProduct->save();
        }

        /** Store transaction details **/
        $transaction = new Transaction();

        $transaction->order_id = $order->id;
        $transaction->transaction_id = $transactionId;
        $transaction->payment_method = $paymentMethod;
        $transaction->amount = getFinalPayableAmount();
        $transaction->amount_real_currency = $paidAmount;
        $transaction->amount_real_currency_name = $paidCurrencyName;
        $transaction->save();
    }

    /** Session clear **/
    public function clearSession()
    {
        \Cart::destroy();
        Session::forget('address');
        Session::forget('shipping_method');
        Session::forget('coupon');
    }

    /** Paypal configuration **/
    public function paypalConfig()
    {
        $paypalSetting = PaypalSetting::first();
        
        $config =
        [
            'mode'    => $paypalSetting->mode === 1 ? 'live' : 'sandbox', 
            'sandbox' => [
                'client_id'         => $paypalSetting->client_id,
                'client_secret'     => $paypalSetting->secret_key,
                'app_id'            => '',
            ],
            'live' => [
                'client_id'         => $paypalSetting->client_id,
                'client_secret'     => $paypalSetting->secret_key,
                'app_id'            => '',
            ],

            'payment_action' => 'Sale', 
            'currency'       => $paypalSetting->currency_name,
            'notify_url'     => '', 
            'locale'         => 'en_US', 
            'validate_ssl'   => true,
        ];
        return $config;
    }

    /** Paypal redirect **/
    public function payWithPaypal()
    {
        $config = $this->paypalConfig();
        $paypalSetting = PaypalSetting::first();
        
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        /** Calculate payable amount depending on currency rate **/
        $total = getFinalPayableAmount();
        $payableAmount = round($total* $paypalSetting->currency_rate, 2);
        
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.paypal.success'),
                "cancel_url" => route('user.paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => $config['currency'],
                        "value" => $payableAmount,
                    ]
                ]
            ]
        ]);
        
        if(isset($response['id']) && $response['id'] !== null){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve'){
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('user.paypal.cancel');
        }

    }

    /** Paypal payment success **/
    public function paypalSuccess(Request $request)
    {
        $config = $this->paypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status'] === 'COMPLETED'){
            
            /** Calculate payable amount depending on currency rate **/
            $paypalSetting = PaypalSetting::first();
            $total = getFinalPayableAmount();
            $paidAmount = round($total * $paypalSetting->currency_rate, 2);
            
            $this->storeOrder('paypal', 1, $response['id'], $paidAmount, $paypalSetting->currency_name);

            toastr('Successfully Paid!!', 'success', 'Success');

            /** Destroy session data **/
            $this->clearSession();
            
            return redirect()->route('user.payment.success');
        }

        return redirect()->route('user.paypal.cancel');
    }

    public function paypalCancel()
    {
        toastr('Something is wrong please try again latter!!', 'error', 'Error');
        
        return redirect()->route('user.payment');
    }

    /**** Stripe Payment ****/
    public function payWithStripe(Request $request)
    {
        $stripeSetting = StripeSetting::first();
        /** Calculate payable amount depending on currency rate **/
        $total = getFinalPayableAmount();
        $payableAmount = round($total * $stripeSetting->currency_rate, 2);
        
        Stripe::setApiKey($stripeSetting->secret_key);
        $response = Charge::create([
            "amount" => $payableAmount * 100,
            "currency" => $stripeSetting->currency_name,
            "source" => $request->stripe_token,
            "description" => "Product Purchase!"
        ]);

        if($response->status === 'succeeded'){
            $this->storeOrder('stripe', 1, $response->id, $payableAmount, $stripeSetting->currency_name);
            
            $this->clearSession();

            toastr('Successfully Paid!!', 'success', 'Success');

            return redirect()->route('user.payment.success');
        } else {
            toastr('Something is wrong please try again latter!!', 'error', 'Error');

            return redirect()->route('user.payment');
        }
    }

    /**** Razorpay Payment ****/
    // public function payWithRazorpay(Request $request)
    // {
    //     dd($request->all());
    // }
}