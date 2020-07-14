<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Raiser;
use App\Logo;
use App\Info;
use App\Category;
use App\EventHistory;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
     public function show($id){


   
    		$info = Info::first();
            $galleries = Event::where('is_approved',true)
                              ->orderBy('created_at','desc')
                              ->take(6)
                              ->get();
            $events = Event::where('category_id',$id)
                           ->get();

            $logo = Logo::first();
            $categories=Category::all();
            $name = Category::where('id',$id)
                            ->first();
            $histories = EventHistory::orderBy('event_raised', 'desc')
                                 ->orderBy('event_days', 'asc')
                                 ->orderBy('event_goal', 'desc')
                                 ->take(3)
                                 ->get();

    	return view('home.categoryevent',compact('events','galleries','logo','categories','name','histories','info'));

    	//return Response::json($event->raiser->name);

    	}
    	
}
