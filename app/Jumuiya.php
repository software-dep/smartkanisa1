<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jumuiya extends Model
{
    public function mtaa()
    {
        return $this->belongsTo('App\Mtaa','mtaa_id');
    }


    public  function family(){
        return $this->hasMany('App\Familia','jumuiya_id');
    }


    public function donations()
    {
        return  $this->belongsToMany('App\Donation','donation_jumuiya','jumuiya_id','donation_id')->withPivot('amount');
    }
}
