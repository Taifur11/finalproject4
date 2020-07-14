<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dnonor;
use App\Logo;
use App\Event;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class LoginController extends Controller
{
    public function showDonorLoginForm()
    {   $logo = Logo::first();
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        return view('donor.login',compact('logo','galleries'));
    }

    public function donorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:4'
        ]);

        $email=$request->email;
    	$password=$request->password;

$donor = DB::table('donors')
        ->where('email',$email)
        ->where('password',$password)
        ->first();



        if($donor){

        $request->session()->put('id',$donor->id);
        $request->session()->put('name',$donor->name);
        $request->session()->put('email',$donor->email);
        Toastr::success('You Successfully Logged In :) Now You Can Donate:)','Success');
        return redirect('/');
    }
    else{
        return redirect()->route('donor.login');
    }
        
    }


    public function donorlogout(Request $request)
    {
        $request->session()->flush();
        Toastr::success('You Are Logged Out :)','Success');
        return redirect()->route('index');
    }
}
