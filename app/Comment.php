<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function donor()
    {
        return $this->belongsTo('App\Donor');
    }
}
