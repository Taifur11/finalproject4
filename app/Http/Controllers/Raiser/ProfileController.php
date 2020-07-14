<?php

namespace App\Http\Controllers\Raiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Raiser;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator,Redirect,Response,File;
use Brian2694\Toastr\Facades\Toastr;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:raiser');
    }

    public function index()
    {
       
        $user=Auth::guard('raiser')->user()->id;

        $profile = DB::table('raisers')
        ->where('id',$user)
        ->first();
        
         //return Response::json($profile);
       return view('raiser.profile.index',compact('profile'));
    }

    public function edit($id)
    {
        $profile = DB::table('raisers')
        ->where('id',$id)
        ->first();
        return view('raiser.profile.edit',compact('profile'));
    }

    public function update(Request $request,$id)
    {
    	$profile=Raiser::find($id);

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'image' => 'image | mimes:jpeg,jpg,png,bmp | max:10000',
            /*'bkashphone_no' => 'required',
            'rocketphone_no' => 'required',*/
        ]);
        
        if($request->hasfile('image')){
            if(file_exists($profile->image)){
                unlink($profile->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/raiser/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;

        }
        else{
            $imageUrl=$profile->image;
        }

       
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->address = $request->address;
        $profile->bkashphone_no = $request->bkashphone_no;
        $profile->rocketphone_no = $request->rocketphone_no;
        $profile->image = $imageUrl;
        $profile->save();

        Toastr::success('Profile Successfully Updated :)','Success');
        return redirect()->route('raiser.profile.index');
    }

}
