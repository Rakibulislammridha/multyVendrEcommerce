<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $home_page_banner_section_one = Advertisement::where('key', 'home_page_banner_section_one')->first();
        $home_page_banner_section_one = json_decode($home_page_banner_section_one->value);

        $home_page_banner_section_two = Advertisement::where('key', 'home_page_banner_section_two')->first();
        $home_page_banner_section_two = json_decode($home_page_banner_section_two?->value);

        $home_page_banner_section_three = Advertisement::where('key', 'home_page_banner_section_three')->first();
        $home_page_banner_section_three = json_decode($home_page_banner_section_three?->value);

        $home_page_banner_section_four = Advertisement::where('key', 'home_page_banner_section_four')->first();
        $home_page_banner_section_four = json_decode($home_page_banner_section_four?->value);

        $productpage_banner_section = Advertisement::where('key', 'productpage_banner_section')->first();
        $productpage_banner_section = json_decode($productpage_banner_section?->value);

        $cart_page_banner_section = Advertisement::where('key', 'cart_page_banner_section')->first();
        $cart_page_banner_section = json_decode($cart_page_banner_section?->value);

        return view('admin.advertisement.index', compact('home_page_banner_section_one', 'home_page_banner_section_two', 'home_page_banner_section_three', 'home_page_banner_section_four', 'productpage_banner_section', 'cart_page_banner_section'));
    }

    public function homepageBannerSectionOne(Request $request)
    {
        $request->validate([
            'banner_image' => ['image'],
            'banner_url' => ['required']
        ]);

        /** Handle The Image Upload **/
        $imagePath = $this->updateImage($request, 'banner_image', 'uploads', '');

        $value = [
          'banner_one' => [
                'banner_url' => $request->banner_url,
                'status' => $request->status == 'on' ? 1 : 0,
          ]
        ];

        if(!empty($imagePath)) {
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_old_image;
        }

        $value = json_encode($value);

     Advertisement::updateOrCreate([
        'key' => 'home_page_banner_section_one'
    ],[
        'value' => $value,
    ]);

    toastr('Updated Successfully!!', 'success', 'Success');

    return redirect()->back();
    }

    public function homepageBannerSectionTwo(Request $request)
    {

        $request->validate([
            'banner_one_image' => ['image'],
            'banner_one_url' => ['required'],
            'banner_two_image' => ['image'],
            'banner_two_url' => ['required'],
        ]);

        /** Handle The Image Upload **/
        $imagePath = $this->updateImage($request, 'banner_one_image', 'uploads', '');
        $imagePathTwo = $this->updateImage($request, 'banner_two_image', 'uploads', '');

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_one_url,
                'status' => $request->banner_one_status == 'on' ? 1 : 0,
            ],
            'banner_two' => [
                'banner_url' => $request->banner_two_url,
                'status' => $request->banner_two_status == 'on' ? 1 : 0,
            ],
        ];

        if (!empty($imagePath)) {
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_one_old_image;
        }

        if (!empty($imagePath)) {
            $value['banner_two']['banner_image'] = $imagePathTwo;
        } else {
            $value['banner_two']['banner_image'] = $request->banner_two_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate([
            'key' => 'home_page_banner_section_two'
        ], [
            'value' => $value,
        ]);

        toastr('Updated Successfully!!', 'success', 'Success');

        return redirect()->back();
    }

    public function homepageBannerSectionThree(Request $request)
    {
        $request->validate([
            'banner_one_image' => ['image'],
            'banner_one_url' => ['required'],
            'banner_two_image' => ['image'],
            'banner_two_url' => ['required'],
            'banner_three_image' => ['image'],
            'banner_three_url' => ['required'],
        ]);

        /** Handle The Image Upload **/
        $imagePath = $this->updateImage($request, 'banner_one_image', 'uploads', '');
        $imagePathTwo = $this->updateImage($request, 'banner_two_image', 'uploads', '');
        $imagePathThree = $this->updateImage($request, 'banner_three_image', 'uploads', '');

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_one_url,
                'status' => $request->banner_one_status == 'on' ? 1 : 0,
            ],
            'banner_two' => [
                'banner_url' => $request->banner_two_url,
                'status' => $request->banner_two_status == 'on' ? 1 : 0,
            ],
            'banner_three' => [
                'banner_url' => $request->banner_three_url,
                'status' => $request->banner_three_status == 'on' ? 1 : 0,
            ],
        ];

        if (!empty($imagePath)) {
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_one_old_image;
        }

        if (!empty($imagePathTwo)) {
            $value['banner_two']['banner_image'] = $imagePathTwo;
        } else {
            $value['banner_two']['banner_image'] = $request->banner_two_old_image;
        }

        if (!empty($imagePathThree)) {
            $value['banner_three']['banner_image'] = $imagePathThree;
        } else {
            $value['banner_three']['banner_image'] = $request->banner_three_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate([
            'key' => 'home_page_banner_section_three'
        ], [
            'value' => $value,
        ]);

        toastr('Updated Successfully!!', 'success', 'Success');

        return redirect()->back();
    }

    public function homepageBannerSectionFour(Request $request)
    {
        $request->validate([
            'banner_image' => ['image'],
            'banner_url' => ['required']
        ]);

        /** Handle The Image Upload **/
        $imagePath = $this->updateImage($request, 'banner_image', 'uploads', '');

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_url,
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        ];

        if (!empty($imagePath)) {
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate([
            'key' => 'home_page_banner_section_four'
        ], [
            'value' => $value,
        ]);

        toastr('Updated Successfully!!', 'success', 'Success');

        return redirect()->back();
    }

    public function productPageBanner(Request $request)
    {
        $request->validate([
            'banner_image' => ['image'],
            'banner_url' => ['required']
        ]);

        /** Handle The Image Upload **/
        $imagePath = $this->updateImage($request, 'banner_image', 'uploads', '');

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_url,
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        ];

        if (!empty($imagePath)) {
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate([
            'key' => 'productpage_banner_section'
        ], [
            'value' => $value,
        ]);

        toastr('Updated Successfully!!', 'success', 'Success');

        return redirect()->back();
    }

    public function cartPageBanner(Request $request)
    {
        $request->validate([
            'banner_one_image' => ['image'],
            'banner_one_url' => ['required'],
            'banner_two_image' => ['image'],
            'banner_two_url' => ['required'],
        ]);

        /** Handle The Image Upload **/
        $imagePath = $this->updateImage($request, 'banner_one_image', 'uploads', '');
        $imagePathTwo = $this->updateImage($request, 'banner_two_image', 'uploads', '');

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_one_url,
                'status' => $request->banner_one_status == 'on' ? 1 : 0,
            ],
            'banner_two' => [
                'banner_url' => $request->banner_two_url,
                'status' => $request->banner_two_status == 'on' ? 1 : 0,
            ],
        ];

        if (!empty($imagePath)) {
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_one_old_image;
        }

        if (!empty($imagePath)) {
            $value['banner_two']['banner_image'] = $imagePathTwo;
        } else {
            $value['banner_two']['banner_image'] = $request->banner_two_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate([
            'key' => 'productpage_banner_section'
        ], [
            'value' => $value,
        ]);

        toastr('Updated Successfully!!', 'success', 'Success');

        return redirect()->back();
    }
}
