<?php

namespace App\Http\Controllers\Raiser;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Category;
use App\Event;
use App\Raiser;
use App\Admin;
use App\Percentage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
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
      $this->middleware('auth:raiser');
        
      
    }



    public function index()
    {
        
        $user=Auth::guard('raiser')->user()->id;
        $today=Carbon::now();
        $events = DB::table('events')
        ->where('raiser_id',$user)
        ->latest()->get();
       return view('raiser.event.index',compact('events','today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('raiser.event.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            request()->validate([
            'title' => 'required',
            'goal' => 'required',
            'exdate' => 'required',
            'category' => 'required',
            'body' => 'required',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
       ]);


if($request->hasfile('image')){
            
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/event/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;




        $event = new Event();
        $event->image=$imageUrl;
        $event->raiser_id = Auth::guard('raiser')->user()->id;
        $event->category_id = $request->category;
        $event->title = $request->title;

        $str = strtolower($request->title);

        $event->slug = preg_replace('/\s+/', '-', $str);
        $event->goal = $request->goal;
        $event->exdate = $request->exdate;
        $event->body = $request->body;
        $event->is_approved = false;
        

        $event->save();



    $admins = Admin::all();
            foreach ($admins as $admin)
            {

    Mail::to($admin->email)->send(new SendEmail($event));

}

        
        Toastr::success('Event Successfully Created :)','Success');
        return redirect()->route('raiser.event.index');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $user=Auth::guard('raiser')->user()->id;
        if($event->raiser_id != $user){
            Toastr::error('You are not authorized to access this event','Error');
            return redirect()->back();
        }


   

        return view('raiser.event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $user=Auth::guard('raiser')->user()->id;
        if($event->raiser_id != $user){
            Toastr::error('You are not authorized to access this event','Error');
            return redirect()->back();
        }
        $categories = Category::all();
        return view('raiser.event.edit',compact('event','categories'));
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
        $user=Auth::guard('raiser')->user()->id;
        if($event->raiser_id != $user){
            Toastr::error('You are not authorized to access this event','Error');
            return redirect()->back();
        }

        $this->validate($request,[
            'title' => 'required',
            'goal' => 'required',
            'exdate' => 'required',
            'image' => 'image | mimes:jpeg,jpg,png,bmp | max:10000',
            'category' => 'required',
            'body' => 'required',
        ]);
        
        if($request->hasfile('image')){
            if(file_exists($event->image)){
                unlink($event->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/event/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;

        }
        else{
            $imageUrl=$event->image;
        }

        $event->raiser_id = Auth::guard('raiser')->user()->id;
        $event->category_id = $request->category;
        $event->title = $request->title;

        $str = strtolower($request->title);

        $event->slug = preg_replace('/\s+/', '-', $str);
        $event->goal = $request->goal;
        $event->exdate = $request->exdate;
        $event->body = $request->body;
        $event->is_approved = false;
        $event->image = $imageUrl;

        $event->save();

        Toastr::success('Event Successfully Updated :)','Success');
        return redirect()->route('raiser.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $user=Auth::guard('raiser')->user()->id;
        if($event->raiser_id != $user){
            Toastr::error('You are not authorized to access this event','Error');
            return redirect()->back();
        }
        if(file_exists($event->image)){
            unlink($event->image);
        }
        $event->delete();
        Toastr::success('Event Successfully Deleted :)','Success');
        return redirect()->back();
    }



    public function withdraw()
    {
    
        $user=Auth::guard('raiser')->user()->id;

        $events = DB::table('events')
        ->where('raiser_id',$user)
        ->latest()->get();
        $percentage = Percentage::first();

        if($percentage){
          return view('raiser.event.withdraw',compact('events','percentage'));  
        }
        else{
            $percentage=0;
        return view('raiser.event.withdraw',compact('events','percentage'));
        }
       
    }

    public function expire()
    {
      $user=Auth::guard('raiser')->user()->id;
      $today=Carbon::now();
      $events = DB::table('events')
        ->where('raiser_id',$user)
        ->where('exdate','<=',$today)
        ->latest()->get();
      $percentage = Percentage::first();

        if($percentage){
          return view('raiser.event.expire',compact('events','percentage'));  
        }
        else{
            $percentage=0;
        return view('raiser.event.expire',compact('events','percentage'));
        }
    }

    public function renew($id){
      $user=Auth::guard('raiser')->user()->id;
      $event=Event::find($id);
        if($event->raiser_id != $user){
            Toastr::error('You are not authorized to access this event','Error');
            return redirect()->back();
        }
        $categories = Category::all();
        return view('raiser.event.renew',compact('event','categories'));
    }

    public function renewupdate(Request $request,$id){
      $user=Auth::guard('raiser')->user()->id;
      $event=Event::find($id);
        if($event->raiser_id != $user){
            Toastr::error('You are not authorized to access this event','Error');
            return redirect()->back();
        }
        $num=$event->no_of_expire;
        $num++;
        $event->exdate = $request->exdate;
        $event->status = false;
        $event->is_approved = false;
        $event->expire_status = true;
        $event->no_of_expire = $num;
        $event->save();

        Toastr::success('Event Ending Successfully Updated :)','Success');
        return redirect()->route('raiser.event.index');
        
    }
}
