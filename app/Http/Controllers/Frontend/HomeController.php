<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $flashSaleDate = FlashSale::first();
        $flashSaleItem = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->get();
        $popularCategories = HomePageSetting::where('key', 'popular_category_section')->first();
        $brands = Brand::where('status', 1)->where('is_featured', 1)->get();
        $typeBaseProducts = $this->getTypeBaseProduct();
        $categorySliderSectionOne = HomePageSetting::where('key', 'product_slider_section_one')->first();
        $categorySliderSectionTwo = HomePageSetting::where('key', 'product_slider_section_two')->first();
        $categorySliderSectionThree = HomePageSetting::where('key', 'product_slider_section_three')->first();

        /** Banners **/
        $home_page_banner_section_one = Advertisement::where('key', 'home_page_banner_section_one')->first();
        $home_page_banner_section_one = json_decode($home_page_banner_section_one->value);

        $home_page_banner_section_two = Advertisement::where('key', 'home_page_banner_section_two')->first();
        $home_page_banner_section_two = json_decode($home_page_banner_section_two?->value);

        $home_page_banner_section_three = Advertisement::where('key', 'home_page_banner_section_three')->first();
        $home_page_banner_section_three = json_decode($home_page_banner_section_three?->value);

        $home_page_banner_section_four = Advertisement::where('key', 'home_page_banner_section_four')->first();
        $home_page_banner_section_four = json_decode($home_page_banner_section_four?->value);
        
        return view('frontend.home.home', 
        compact(
            'sliders',
            'flashSaleDate',
            'flashSaleItem',
            'popularCategories',
            'brands',
            'typeBaseProducts',
            'categorySliderSectionOne',
            'categorySliderSectionTwo',
            'categorySliderSectionThree',
            'home_page_banner_section_one',
            'home_page_banner_section_two',
            'home_page_banner_section_three',
            'home_page_banner_section_four',
        ));
    }

    public function getTypeBaseProduct()
    {
        $typeBaseProducts = [];

        $typeBaseProducts['new_arrival'] = Product::where(['product_type' => 'new_arrival', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['featured_product'] = Product::where(['product_type' => 'featured_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['top_product'] = Product::where(['product_type' => 'top_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['best_product'] = Product::where(['product_type' => 'best_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        return $typeBaseProducts;
    }

    public function vendorPage()
    {
        $vendors = Vendor::where('status', 1)->paginate(10);
        return view('frontend.pages.vendor', compact('vendors'));
    }

    public function vendorProductsPage(string $id)
    {
        $products = Product::where(['status' => 1, 'is_approved' => 1, 'vendor_id' => $id])->orderBy('id', 'DESC')->paginate(12);
        

        $categories = Category::where(['status' => 1])->get();
        $brands = Brand::where(['status' => 1])->get();
        $vendor = Vendor::findOrFail($id);
        
        return view('frontend.pages.vendor-products', compact('products', 'categories', 'brands', 'vendor'));
    }
}