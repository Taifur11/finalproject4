<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailRaiser;
use App\Mail\SendEmailDonors;
use App\Event;
use App\EventHistory;
use App\Raiser;
use App\Subscriber;
use App\Donor;
use App\Category;
use App\Percentage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Validator,Redirect,Response,File;
use Carbon\Carbon;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index()
    {
        $events = Event::latest()->get();
        
        return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if(file_exists($event->image)){
            unlink($event->image);
        }
        $event->delete();
        Toastr::success('Event Successfully Deleted :)','Success');
        return redirect()->back();
    }

    public function withdrawingdestroy($id)
    {
       $event=Event::find($id);
       $eventhistory = new EventHistory();
       $eventhistory->event_title=$event->title;
       $eventhistory->event_body=$event->body;
       $eventhistory->event_goal=$event->goal;
       $eventhistory->event_raised=$event->raised;

        
        //Date
       $from=$event->created_at;
        $to = Carbon::now();
        $diff_in_days = $to->diffInDays($from);
        //Date



       $eventhistory->event_days=$diff_in_days;
       $eventhistory->creator_name=$event->raiser->name;
       $eventhistory->creator_email=$event->raiser->email;


       //image
       $img=$event->image;
       $name= substr($img, 13);
       $folder="images/eventhistory/event/";
       //image raiser
       $img_raiser=$event->raiser->image;
       
       $name_raiser= substr($img_raiser, 14);
       $folder_raiser="images/eventhistory/raiser/";

       //image
        $oldPath = $event->image;
        $newPath = $folder.time().$name; 

        \File::copy($oldPath , $newPath);

        //image raiser
        $oldPath_raiser = $event->raiser->image;
        $newPath_raiser = $folder_raiser.time().$name_raiser; 

        \File::copy($oldPath_raiser , $newPath_raiser);
        



       $eventhistory->creator_image=$newPath_raiser;
       $eventhistory->event_image=$newPath;
        

       $eventhistory->save();


       if(file_exists($event->image)){
            unlink($event->image);
        }

        $event->delete();
        Toastr::success('Event Successfully Withdrawed :)','Success');
        return redirect()->back();
    }



    public function pending()
    {
        $events = Event::where('is_approved',false)->get();
        return view('admin.event.pending',compact('events'));
    }

    public function expending()
    {
        $events = Event::where('expire_status',true)->get();
        return view('admin.event.expending',compact('events'));
    }
    public function withdrawing()
    {   
        $events = Event::where('tx_status',true)->get();
        $percentage = Percentage::first();

        if($percentage){
          return view('admin.event.withdrawing',compact('events','percentage'));  
        }
        else{
            $percentage=0;
        return view('admin.event.withdrawing',compact('events','percentage'));
        }
    }

    public function sliding()
    {
        $events = Event::where('is_approved',true)->get();
        return view('admin.event.sliding',compact('events'));
    }

    public function slider($id)
    {
        $event = Event::find($id);
        if ($event->status == false)
        {
            $event->status = true;
            $event->save();
         }
         Toastr::success('Slider Image Successfully Selected :)','Success');
         return redirect()->back();
    }

    public function notslider($id)
    {
        $event = Event::find($id);
        if ($event->status == true)
        {
            $event->status = false;
            $event->save();
         }
         Toastr::info('Slider Image Successfully Removed :)','Info');
         return redirect()->back();
    }


    public function approval($id)
    {
        $event = Event::find($id);
        if ($event->is_approved == false)
        {
            $event->is_approved = true;
            $event->save();

            $email=$event->raiser->email;
        Mail::to($email)->send(new SendEmailRaiser($event));

    $donors = Donor::all();
            foreach ($donors as $donor)
            {

    Mail::to($donor->email)->send(new SendEmailDonors($event));

}



            Toastr::success('Event Successfully Approved :)','Success');
        }
        else
        {
            Toastr::info('This Event is already approved','Info');
        }

        return redirect()->back();
    }


    public function exapproval($id)
    {
        $event = Event::find($id);
        if ($event->is_approved == false)
        {
            $event->is_approved = true;
            $event->expire_status = false;
            $event->save();

            


            Toastr::success('Event Successfully  Again Approved :)','Success');
        }
        else
        {
            Toastr::info('This Event is already approved','Info');
        }

        return redirect()->back();
    }
}
