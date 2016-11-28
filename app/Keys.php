<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keys extends Model
{
    protected $table = 'keys';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
