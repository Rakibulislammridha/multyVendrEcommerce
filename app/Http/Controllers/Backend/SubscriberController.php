<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\NewsLetterSubscriberDataTable;
use App\Http\Controllers\Controller;
use App\Mail\NewsLetter;
use App\Models\NewsLetterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function index(NewsLetterSubscriberDataTable $dataTable)
    {
        return $dataTable->render('admin.subscriber.index');
    }
    
    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => ['required'],
            'message' => ['required'] 
        ]);

        $emails = NewsLetterSubscriber::where('is_verified', 1)->pluck('email')->toArray();
        Mail::to($emails)->send(new NewsLetter($request->subject, $request->message));

        toastr('Mail has been send', 'success', 'Success');

        return redirect()->back();
    }
    
    public function destroy(string $id)
    {
        $subscriber = NewsLetterSubscriber::findOrFail($id)->delete();

        return response(['status' => 'success', 'message' => 'Subscriber Deleted Successfully!!']);
    } 
}