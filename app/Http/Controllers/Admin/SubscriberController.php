<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
class SubscriberController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber.index',compact('subscribers'));
    }

    public function destroy($subscriber)
    {
        $subscriber = Subscriber::findOrFail($subscriber);
        $subscriber->delete();
        Toastr::success('Subscriber Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
