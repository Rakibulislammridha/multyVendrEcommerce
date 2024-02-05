<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AdminReviewDataTable;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index(AdminReviewDataTable $dataTable)
    {
        return $dataTable->render('admin.product.review.index');
    }

    public function changeStatus(Request $request)
    {
        $review = Review::findOrFail($request->id);
        $review->status = $request->status == 'true' ? 1 : 0;
        $review->save();
        return response(['message' => 'Status Has Been Updated!']);
    }
}