<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    public function matoleo()
    {     
            return $this->belongsTo('App\Matoleo', 'misa_id');       
    }
}
