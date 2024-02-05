<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserProductReviewsDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductReviewGallery;
use App\Models\Review;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    use ImageUploadTrait;
    
    public function create(Request $request)
    {
        $request->validate([
            'rating' => ['required'],
            'review' => ['required', 'max:400'],
            'images.*' => ['image']
        ]);

        $checkReviewExist = Review::where(['product_id' => $request->product_id, 'user_id' => Auth::user()->id])->first();

        if($checkReviewExist) {
            toastr('You already added review on this product!!', 'error', 'Error');

            return redirect()->back();
        }

        $imagePaths = $this->uploadMultiImage($request, 'images', 'uploads');

        $productReview = new Review();
        $productReview->product_id = $request->product_id;
        $productReview->user_id = Auth::user()->id;
        $productReview->vendor_id = $request->vendor_id;
        $productReview->rating = $request->rating;
        $productReview->review = $request->review;
        $productReview->status = 0;
        $productReview->save();

        if(!empty($imagePaths)) {
            
            foreach($imagePaths as $path) {
                $reviewGallery = new ProductReviewGallery();
                
                $reviewGallery->review_id = $productReview->id;
                $reviewGallery->image = $path;
                $reviewGallery->save();
            }
        }

        toastr('Review Added Successfully!!', 'success', 'Success');

        return redirect()->back();
    }

    public function index(UserProductReviewsDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.review.index');
    }
}