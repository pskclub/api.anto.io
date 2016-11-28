<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    protected $table = 'channels';

    protected $hidden = [
        'id','thing_id'
    ];

    public function thing()
    {
        return $this->belongsTo('App\Things');
    }
}
