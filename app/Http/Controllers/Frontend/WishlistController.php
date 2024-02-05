<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistProducts = Wishlist::with('product')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        // $showCountForWishlist= Wishlist::where('user_id', Auth::user()->id)->count();
         
        return view('frontend.pages.wishlist', compact('wishlistProducts'));
    }
    
    public function addToWishlist(Request $request)
    {
        if(!Auth::check()){
            return response([
                'status' => 'error', 
                'message' => 'Please before add a product into wishlist!!'
            ]);
        };

        $wishlistCount = Wishlist::where(['product_id' => $request->id, 'user_id' => Auth::user()->id])->count();
        if($wishlistCount > 0){
            return response([
                'status' => 'error',
                'message' => 'This product is already exist on your wishlist!!'
            ]);
        };
        
        $wishlist = new Wishlist();
        $wishlist->product_id = $request->id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();

        $count = Wishlist::where('user_id', Auth::user()->id)->count();

        return response([
            'status' => 'success',
            'message' => 'Product added on your wishlist!!',
            'count' => $count,
        ]);
    }

    public function destroy(string $id)
    {
        $wishlistProducts = Wishlist::where('id', $id)->firstOrFail();
        if($wishlistProducts->user_id !== Auth::user()->id){
            return redirect()->back();
        }
        $wishlistProducts->delete();

        toastr('Product Removed Successfully From Wishlist!!', 'success', 'Success');

        return redirect()->back();
    }
}