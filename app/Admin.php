<?php

/*namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name', 'email', 'password','username','image','phone_no','account_info','address',
    ];

    protected $hidden = [
        'password',
    ];

    public function events(){
        return $this->hasMany('App\Event');
    }
}*/
 




    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admin extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'admin';

        protected $fillable = [
            'name', 'email', 'password','username','image','phone_no','account_info','address',
        ];

        protected $hidden = [
            'password',
        ];
    }
