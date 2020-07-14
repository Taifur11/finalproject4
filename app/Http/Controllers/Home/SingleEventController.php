<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Raiser;
use App\Logo;
use App\Info;
use App\Category;
use App\Comment;
use App\EventHistory;
use Brian2694\Toastr\Facades\Toastr;
class SingleEventController extends Controller
{
    public function show($id)

    {   
        
        $event = Event::where('id',$id)->first();
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        $logo = Logo::first();
        $info = Info::first();
        $categories=Category::all();

        $histories = EventHistory::orderBy('event_raised', 'desc')
                                 ->orderBy('event_days', 'asc')
                                 ->orderBy('event_goal', 'desc')
                                 ->take(3)
                                 ->get();
        return view('home.singleevent',compact('event','galleries','logo','categories','histories','info'));
        
    }



    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'comment'=>'required',
        ]);
        if(session()->get('email') and session()->get('id')){
        $comment = new Comment();
        $comment->name=$request->name;
        $comment->donor_id=session()->get('id');
        $comment->event_id=$request->id;
        $comment->phone=$request->phone;
        $comment->comment=$request->comment;
        $comment->save();
        Toastr::success('Comment Successfully Taken :)' ,'Success');
        return redirect()->route('index');
        }
        else{
            Toastr::error('Please Login :)' ,'Error');
        return redirect()->route('index');
        }
        
    }

}
