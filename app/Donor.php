<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Donor extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'donor';

        protected $fillable = [
            'name', 'email', 'password','image','phone_no','address',
        ];

        protected $hidden = [
            'password',
        ];

    public function events()
    {
        return $this->belongsToMany('App\Event');
    }

    public function comments()
    {
        return $this->hasMany('App\Event');
    }

}