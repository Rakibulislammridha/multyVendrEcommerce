<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    /** Show Cart Page **/
    public function cartDetails()
    {
        $cartItems = Cart::content();

        if(count($cartItems) === 0){
            Session::forget('coupon');
            toastr('Please add some product in your cart for view the cart page!!!', 'warning', 'Cart is empty!');
            return redirect()->route('home');
        }

        $cart_page_banner_section = Advertisement::where('key', 'cart_page_banner_section')->first();
        $cart_page_banner_section = json_decode($cart_page_banner_section?->value);

        return view('frontend.pages.cart-detail', compact('cartItems', 'cart_page_banner_section'));
    }
    
    /** Add item to cart **/
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        /** Check product quantity **/
        if($product->qty == 0){
            return response(['status' => 'error', 'message' => 'Product stock out!!']);
        } elseif($product->qty < $request->qty){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock!!']);
        }

        $variants = [];
        $variantTotalAmount = 0;

        if($request->has('variants_items')){
            foreach ($request->variants_items as $item_id) {
                $variantItem = ProductVariantItem::find($item_id);

                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;

                $variantTotalAmount += $variantItem->price;
            }
        }

        /** Check discount **/
        $productPrice = 0;
        
        if(checkDiscount($product)){
            $productPrice = $product->offer_price;
        } else {
            $productPrice = $product->price;
        }

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        Cart::add($cartData);

        return response(['status' => 'success', 'message' => 'Added To Cart Successfully!!']);
    }

    /** Update product quantity **/
    public function updateProductQty(Request $request)
    {
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);
        
        /** Check product quantity **/
        if ($product->qty == 0) {
            return response(['status' => 'error', 'message' => 'Product stock out!!']);
        } elseif ($product->qty < $request->qty) {
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock!!']);
        }
        
        Cart::update($request->rowId, $request->quantity);

        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status'=> 'success', 'message' => 'Product Quantity Updated !!', 'product_total' => $productTotal]);
    }

    /** Get product total **/
    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;

        return $total;
    }

    /** Get cart total amount **/
    public function cartTotal()
    {
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    /** Clear all cart products **/
    public function clearCart()
    {
        Cart::destroy();

        return response(['status' => 'success', 'message' => 'Cart cleared successfully!!']);
    }

    /** remove product from cart **/
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        toastr('Product has been removed successfully!!', 'success', 'Success');
        return redirect()->back();
    }

    /** Get cart count **/
    public function getCartCount()
    {
        return Cart::content()->count();
    }

    /** Get all cart products **/
    public function getCartProducts()
    {
        return Cart::content();
    }
    
    /** Remove sidebar cart **/
    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);

        return response(['status' => 'success', 'message' => 'Product remove successfully!!']);
    }

    /** Apply coupon **/
    public function applyCoupon(Request $request)
    {
        if($request->coupon_code === null){
            return response(['status' => 'error', 'message' => 'Coupon field is required!!']);
        }

        $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();

        if($coupon === null) {
            return response(['status' => 'error', 'message' => 'Wrong Coupon Code!!']);
        } elseif($coupon->start_date > date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon does not exist!!']);
        } elseif ($coupon->end_date < date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'Coupon is expired!!']);
        } elseif($coupon->total_used >= $coupon->quantity) {
            return response(['status' => 'error', 'message' => 'You can not apply this coupon!!']);
        }

        if($coupon->discount_type === 'amount' ) {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount,
            ]);
        } elseif($coupon->discount_type === 'percent'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount,
            ]);
        }
 
        return response(['status' => 'success', 'message' => 'Coupon Added Successfully!!']);
    }

    /** Calculate coupon discount **/
    public function couponCalculation()
    {
        if(Session::has('coupon')){
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            
            if($coupon['discount_type'] === 'amount'){
                $total = $subTotal - $coupon['discount'];

                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            } elseif($coupon['discount_type'] === 'percent') {
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = $subTotal - $discount;

                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
            }
        } else {
            $total = getCartTotal();

            return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
        }
    }
}