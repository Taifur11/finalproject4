<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Donor;
use App\Logo;
use App\Event;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
class RegisterController extends Controller
{
    public function showDonorRegisterForm()
    {   $logo = Logo::first();
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        return view('donor.register',compact('logo','galleries'));
    }


    protected function createDonor(Request $request)
    {
       request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
       ]);


if($request->hasfile('image')){
            
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/donor/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;




        $event = new Donor();
        $event->image=$imageUrl;
        $event->name = $request->name;
        $event->email = $request->email;
        $event->password = $request->password;
        $event->phone_no = $request->phone_no;
        $event->address = $request->address;

        $event->save();
        Toastr::success('You Successfully Register :)','Success');
        return redirect('/');

    }
}

    public function logout(Request $request)
    {
        $request->session()->flush();
        Toastr::success('You Are Logged Out :)','Success');
        return redirect()->route('index');
    }


}