<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Validator,Redirect,Response,File;
use App\Info;
class InfoController extends Controller
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
        $info = Info::first();
        return view('admin.info.index',compact('info'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.create');
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
        'address'=>'required',
        'email'=>'required',
        'phone_no'=>'required',
       ]);


        $count = Info::all()->count();
        if($count == 1){
            Toastr::success('Info Already Exists :)' ,'Success');
        return redirect()->route('admin.info.index');
        }
        else{
            $info = new Info();
            $info->address=$request->address;
            $info->email=$request->email;
            $info->phone_no=$request->phone_no;
            $info->save();
           }

        
        Toastr::success('Info Successfully Created :)','Success');
        return redirect()->route('admin.info.index');
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
        $info = Info::find($id);
        return view('admin.info.edit',compact('info'));
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
        $info=Info::find($id);
        $info->address=$request->address;
        $info->email=$request->email;
        $info->phone_no=$request->phone_no;
        $info->save();
        Toastr::success('Info Successfully Updated :)','Success');
        return redirect()->route('admin.info.index');
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
