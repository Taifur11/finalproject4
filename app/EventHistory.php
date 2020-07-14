<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventHistory extends Model
{
    protected $fillable = [
            'event_title', 'event_body', 'event_goal','event_raised','event_days','creator_name','creator_email','creator_image','event_image',
        ];
}
