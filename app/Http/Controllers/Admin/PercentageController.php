<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Percentage;
use Brian2694\Toastr\Facades\Toastr;
class PercentageController extends Controller
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
        $percentage = Percentage::first();
        return view('admin.percentage.index',compact('percentage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('admin.percentage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'percentage'=>'required'
        ]);
        $percentage = new Percentage();
        $count = Percentage::all()->count();
        if($count == 1){
            Toastr::success('Percentage Already Exists :)' ,'Success');
        return redirect()->route('admin.percentage.index');
        }
        else{


        $calculation=$request->percentage;
        $calculation1=$calculation*.01;
        $percentage->percentage=$calculation1;
        
        $percentage->save();
        Toastr::success('Percentage Successfully Created :)' ,'Success');
        return redirect()->route('admin.percentage.index');
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
        $percentage = Percentage::find($id);
        return view('admin.percentage.edit',compact('percentage'));
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
        $percentage=Percentage::find($id);

        $calculation=$request->percentage;
        $calculation1=$calculation*.01;
        $percentage->percentage=$calculation1;
        
        $percentage->save();
        Toastr::success('Percentage Successfully Updated :)','Success');
        return redirect()->route('admin.percentage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Percentage::find($id)->delete();
        Toastr::success('Percentage Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
