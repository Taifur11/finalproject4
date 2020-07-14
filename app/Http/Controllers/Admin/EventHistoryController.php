<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EventHistory;
use Brian2694\Toastr\Facades\Toastr;
use Validator,Redirect,Response,File;
class EventHistoryController extends Controller
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
        $histories = EventHistory::orderBy('event_raised', 'desc')
                                 ->orderBy('event_days', 'asc')
                                 ->orderBy('event_goal', 'desc')
                                 ->get();
        
        return view('admin.history.index',compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventhistory=EventHistory::find($id);
        if(file_exists($eventhistory->creator_image)){
            unlink($eventhistory->creator_image);
        }
        if(file_exists($eventhistory->event_image)){
            unlink($eventhistory->event_image);
        }
        $eventhistory->delete();
        Toastr::success('History Cleared Successfully :)','Success');
        return redirect()->back();
    }
}
