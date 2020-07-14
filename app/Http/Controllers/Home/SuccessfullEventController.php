<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Logo;
use App\Info;
use App\EventHistory;
class SuccessfullEventController extends Controller
{
    public function index()
    {
      
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        $logo = Logo::first();
        $info = Info::first();
        $histories = EventHistory::orderBy('event_raised', 'desc')
                                 ->orderBy('event_days', 'asc')
                                 ->orderBy('event_goal', 'desc')
                                 ->get();
        return view('home.successfullevents',compact('galleries','logo','histories','info'));
    }

    public function show($id)

    {   
        
        $history = EventHistory::where('id',$id)->first();
        //return $event->image;

        //return Response::json($events['id']);
        /*foreach($events as $event){
            $sta = Event::find($event->id);
        if ($sta->status == false)
        {
            $sta->status = true;
            $sta->save();
        }
        }*/
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        $logo = Logo::first();
        $info = Info::first();
        $histories = EventHistory::orderBy('event_raised', 'desc')
                                 ->orderBy('event_days', 'asc')
                                 ->orderBy('event_goal', 'desc')
                                 ->take(3)
                                 ->get();
        return view('home.successfullsingleevent',compact('galleries','logo','histories','history','info'));
    }

}
