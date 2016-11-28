<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    protected $table = 'channels';

    public function thing()
    {
        return $this->belongsTo('App\Things');
    }
}
