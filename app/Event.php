<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function raiser()
    {
        return $this->belongsTo('App\Raiser');
    }

    public function donors()
    {
    	return $this->belongsToMany('App\Donor');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
