<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyHasChannel extends Model
{
    protected $table = 'key_has_channel';

    public function channel()
    {
        return $this->belongsTo('App\Channels');
    }

    public function key()
    {
        return $this->belongsTo('App\Keys');
    }
}
