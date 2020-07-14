<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event;
use App\Service;
use App\Logo;
use App\Info;
use App\EventHistory;
use Validator,Redirect,Response,File;
use Carbon\Carbon;
class IndexController extends Controller
{
    public function index()

    {   
        $info = Info::first();
        $sliders = Event::where('status',true)->where('is_approved',true)->get();
        $today=Carbon::now();
        $events = Event::where('is_approved',true)
                        ->where('exdate','>=',$today)
                        ->orderBy('created_at','desc')->latest()->take(3)->get();

        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        $services = Service::all();
        $logo = Logo::first();
        $histories = EventHistory::orderBy('event_raised', 'desc')
                                 ->orderBy('event_days', 'asc')
                                 ->orderBy('event_goal', 'desc')
                                 ->take(3)
                                 ->get();
        return view('welcome',compact('events','sliders','galleries','services','logo','info','histories'));
    }

}
