<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Raiser;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class RaiserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $raisers = Raiser::latest()->get();
        return view('admin.raiser.index',compact('raisers'));
    }

    public function destroy($raiser)
    {   
        
        

        $events = DB::table('events')
        ->where('raiser_id',$raiser)
        ->get();


        $raiser = Raiser::findOrFail($raiser);
        if(file_exists($raiser->image)){
            unlink($raiser->image);
        }
        $raiser->delete();

        foreach ($events as $event) {
            if(file_exists($event->image)){
            unlink($event->image);}
        }


        Toastr::success('Raiser Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
