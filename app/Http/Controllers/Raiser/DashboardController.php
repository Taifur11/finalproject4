<?php

namespace App\Http\Controllers\Raiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use DB;
class DashboardController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:raiser');
    }

    public function index()
    {

    	$user=Auth::guard('raiser')->user()->id;

        $appevents = DB::table('events')
        ->where('raiser_id',$user)
        ->where('is_approved',true)
        ->latest()->get();

        $penevents = DB::table('events')
        ->where('raiser_id',$user)
        ->where('is_approved',false)
        ->latest()->get();

        $events = DB::table('events')
        ->where('raiser_id',$user)
        ->latest()->get();

    return view('raiser.dashboard',compact('appevents','events','penevents'));
    }
}
