<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thinks extends Model
{
    protected $table = 'thinks';

    public function channels()
    {
        return $this->hasMany('App\Channels');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
