<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parokia extends Model
{


    public function  kigango(){
        return $this->hasMany('App\Kigango','parokis_id');
    }
}
