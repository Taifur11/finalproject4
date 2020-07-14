<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Donor;
use App\Event;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class DonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $donors = Donor::latest()->get();
        return view('admin.donor.index',compact('donors'));
    }

    public function show($id)
    {

    $events = DB::table('events')
    ->join('donor_event', 'events.id', '=', 'donor_event.event_id')
    ->join('donors', 'donors.id', '=', 'donor_event.donor_id')
    ->where('donors.id', '=', $id)->get();

    return view('admin.donor.show',compact('events'));
    }

    public function destroy($donor)
    {
        $donor = Donor::findOrFail($donor);
        $donor->delete();
        Toastr::success('Donor Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
