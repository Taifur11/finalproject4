<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Category;
use App\Logo;
use App\Info;
use App\EventHistory;
class EventController extends Controller
{

    public function index()
    {
        //$events = Event::latest()->paginate(2);
        $events = Event::where('is_approved',true)->orderBy('created_at','desc')->get();
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        $categories=Category::all();
        $logo = Logo::first();
        $info = Info::first();
        $histories = EventHistory::orderBy('event_raised', 'desc')
                                 ->orderBy('event_days', 'asc')
                                 ->orderBy('event_goal', 'desc')
                                 ->take(3)
                                 ->get();
        return view('home.events',compact('events','galleries','categories','logo','histories','info'));
    }
}
