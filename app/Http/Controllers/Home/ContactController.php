<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Logo;
use App\Info;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
class ContactController extends Controller
{
    public function index()
    {
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        $logo = Logo::first();
        $info = Info::first();
        return view('home.contact',compact('galleries','logo','info'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'comments'=>'required',
        ]);
        $contact = new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone_no=$request->phone_no;
        $contact->comment=$request->comments;
        $contact->save();
        Toastr::success('Feedback Successfully Taken :)' ,'Success');
        return redirect()->route('index');
    }
}
