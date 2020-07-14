<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
class PaymentController1 extends Controller
{
    public function payment1(Request $request){
    	$tk=$request->tk;
    	$id=$request->eventid;
    	$event = Event::where('id',$id)->first();
    	//$raised = Event::find($id);
        if ($event->raised == true)
        {
            $event->raised = $event->raised+$tk;
            $event->save();
            return redirect('/');
        }
        else{

        	$event->raised = $tk;
            $event->save();
            return redirect('/');
        }
    	
    }
}
