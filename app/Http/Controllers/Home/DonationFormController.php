<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Raiser;
use App\Logo;
use App\Info;
use DB;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
class DonationFormController extends Controller
{
    public function donation($id){


    	if(session()->get('email')){
    		$event = Event::where('id',$id)->first();
            $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
            $logo = Logo::first();
            $info = Info::first();
            $user_id=session()->get('id');
        $check = DB::table('donor_event')->where('event_id', '=',$id)->where('donor_id',$user_id)->doesntExist();
if($check){
     DB::table('donor_event')->insert(
     array(
            'donor_id'     =>   $user_id, 
            'event_id'   =>   $id
     )
    );
}

    
        return view('home.donationform',compact('event','galleries','logo','info'));
    	}
    	else{
    		return redirect()->route('donor.login');

    	}
    	
    }
}
