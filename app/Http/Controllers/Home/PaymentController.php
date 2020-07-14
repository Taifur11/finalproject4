<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request){
    	$tk=$request->tk;
    	$event_id=$request->eventid;
    	$donor_id=session()->get('id');
    	return view('home.payment',compact('tk','event_id','donor_id'));
    	
    }
}
