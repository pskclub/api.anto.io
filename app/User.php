<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','id','telephone','purpose','role','last_login_at','last_login_ip','updated_at','deleted_at'
    ];

    public function things()
    {
        return $this->hasMany('App\Things');
    }

    public function keys()
    {
        return $this->hasMany('App\Keys');
    }
}
