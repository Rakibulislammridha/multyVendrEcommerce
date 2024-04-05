<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogDetails(string $slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('frontend.pages.blog-detail', compact('blog'));
    }
}
