<?php

namespace App\Http\Controllers\Raiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Brian2694\Toastr\Facades\Toastr;
use Validator,Redirect,Response,File;
class WithdrawController extends Controller
{
    public function withdraw($id)
    {
        $event = Event::find($id);
        if ($event->tx_status == false)
        {
            $event->tx_status = true;
            $event->save();
            Toastr::success('Event Withdraw Request Send :)','Success');
        }
        else
        {
            Toastr::info('This Event is already Withdraw','Info');
        }

        return redirect()->back();
    }
}
