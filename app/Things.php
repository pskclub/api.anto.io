<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Things extends Model
{
    protected $table = 'things';

    protected $hidden = [
        'id','user_id'
    ];

    public function channels()
    {
        return $this->hasMany('App\Channels','thing_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
