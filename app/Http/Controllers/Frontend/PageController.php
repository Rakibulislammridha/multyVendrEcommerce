<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\About;
use App\Models\EmailConfigurationSetting;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function about()
    {
        $about = About::first(); 
        return view('frontend.pages.about', compact('about'));
    }
    
    public function termsAndConditions()
    {
        $terms = TermsAndCondition::first(); 
        return view('frontend.pages.terms-and-conditions', compact('terms'));
    }
    
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    
    public function handleContactForm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required','email', 'max:200'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000'],
        ]);

        $setting = EmailConfigurationSetting::first();
        Mail::to($setting->email)->send(new Contact($request->subject, $request->message, $request->email));

        return response(['status'=> 'success', 'message' => 'Mail Send Successfully!!']);
    }
}