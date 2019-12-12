<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{

    public function matoleo()
    {
        return $this->belongsTo('App\Matoleo', 'misa_id');
    }
}
