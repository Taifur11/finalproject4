<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Validator,Redirect,Response,File;
use App\Logo;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        
        $logo = Logo::first();
        return view('admin.logo.index',compact('logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         request()->validate([
    'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);


        $logo = new Logo();
        $count = Logo::all()->count();
        if($count == 1){
            Toastr::success('Logo Already Exists :)' ,'Success');
        return redirect()->route('admin.logo.index');
        }
        else{
            if($request->hasfile('logo')){
            $file=$request->file('logo');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/logo/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;

            $logo = new Logo();
            $logo->image=$imageUrl;
            $logo->save();
           }

        
        Toastr::success('Logo Successfully Created :)','Success');
        return redirect()->route('admin.logo.index');
    }
}

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo = Logo::find($id);
        return view('admin.logo.edit',compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'image | mimes:jpeg,jpg,png,bmp | max:10000',
        ]);
        
        if($request->hasfile('image')){
            $logo=Logo::find($id);
            if(file_exists($logo->image)){
                unlink($logo->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/logo/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;
            $logo->image=$imageUrl;
            $logo->name=$request->name;
            $logo->save();
            Toastr::info('Logo Successfully Updated :)','Info');
            return redirect()->route('admin.logo.index');
        }
       else{
            $logo=Logo::find($id);
            $imageUrl=$logo->image;
            $logo->image=$imageUrl;
            $logo->name=$request->name;
            $logo->save();
            Toastr::info('Logo Successfully Updated With Out Updating Image :)','Info');
            return redirect()->route('admin.logo.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
