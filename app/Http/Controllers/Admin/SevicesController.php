<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Validator,Redirect,Response,File;
use App\Service;
class SevicesController extends Controller
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
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
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
            'heading' => 'required',
            'body' => 'required',
            'image' => 'image | mimes:jpeg,jpg,png,bmp | max:10000',
        ]);
        
        if($request->hasfile('image')){
            $service=Service::find($id);
            if(file_exists($service->image)){
                unlink($service->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/service/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;
            $service->image=$imageUrl;
            $service->heading=$request->heading;
            $service->body=$request->body;
            $service->save();
            Toastr::info('Service Successfully Updated :)','Info');
            return redirect()->route('admin.services.index');
        }
       else{
            $service=Service::find($id);
            $imageUrl=$service->image;
            $service->image=$imageUrl;
            $service->heading=$request->heading;
            $service->body=$request->body;
            $service->save();
            Toastr::info('Service Successfully Updated With Out Updating Image :)','Info');
            return redirect()->route('admin.services.index');
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
