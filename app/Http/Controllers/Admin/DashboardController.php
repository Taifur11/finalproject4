<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Raiser;
use App\Subscriber;
class DashboardController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');
    }



    public function index()
    {

    $events = Event::where('is_approved',false)->get();
    $events1 = Event::where('is_approved',true)->get();
    $raisers = Raiser::all();
    $subscribers = Subscriber::all();
    return view('admin.dashboard',compact('events','events1','raisers','subscribers'));
    }


}
