<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator,Redirect,Response,File;
use Brian2694\Toastr\Facades\Toastr;
class ProfileController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
       
        $user=Auth::guard('admin')->user()->id;

        $profile = DB::table('admins')
        ->where('id',$user)
        ->first();
        
         //return Response::json($profile);
       return view('admin.profile.index',compact('profile'));
    }

    public function edit($id)
    {
        $profile = DB::table('admins')
        ->where('id',$id)
        ->first();
        return view('admin.profile.edit',compact('profile'));
    }

    public function update(Request $request,$id)
    {
    	$profile=Admin::find($id);

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'image' => 'image | mimes:jpeg,jpg,png,bmp | max:10000',
        ]);
        
        if($request->hasfile('image')){
            if(file_exists($profile->image)){
                unlink($profile->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/admin/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;

        }
        else{
            $imageUrl=$profile->image;
        }

       
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone_no = $request->phone_no;
        $profile->image = $imageUrl;
        $profile->save();

        Toastr::success('Profile Successfully Updated :)','Success');
        return redirect()->route('admin.profile.index');
    }
}
