<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function dashboard()
    {
        $todaysOrder = Order::whereDate('created_at', Carbon::today())->whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();
        $todaysPendeingOrder = Order::whereDate('created_at', Carbon::today())->where( 'order_status', 'pending')->whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();
        $totalOrder = Order::whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();
        $totalPendeingOrder = Order::where( 'order_status', 'pending')->whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();
        $totalCompleteOrder = Order::where( 'order_status', 'delivered')->whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();
        $totalProducts = Product::where('vendor_id', Auth::user()->vendor->id)->count();
        $todaysEarnings = Order::whereDate('created_at', Carbon::today())->where( 'order_status', 'delivered')->whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->sum('sub_total');
        $thisMonthEarnings = Order::whereMonth('created_at', Carbon::now()->month)->where( 'order_status', 'delivered')->whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->sum('sub_total');
        $thisYearEarnings = Order::whereYear('created_at', Carbon::now()->year)->where( 'order_status', 'delivered')->whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->sum('sub_total');
        $totalEarnings = Order::where( 'order_status', 'delivered')->whereHas('orderProducts', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->sum('sub_total');
        $totalReviews = Review::whereHas('product', function($query) {
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();

        return view('vendor.dashboard.dashboard', compact(
            'todaysOrder',
            'todaysPendeingOrder',
            'totalOrder',
            'totalPendeingOrder',
            'totalCompleteOrder',
            'totalProducts',
            'todaysEarnings',
            'thisMonthEarnings',
            'thisYearEarnings',
            'totalEarnings',
            'totalReviews',
        ));
    }
}