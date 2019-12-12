<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    public function jumuiya(){
        return $this->belongsTo('App\Jumuiya','jumuiya_id');
    }


    public  function member(){
        return $this->member('App\Member','familia_id','jumuiya_id','kigango_id','mtaa_id');
    }



    public function donations()
    {
        return  $this->belongsToMany('App\Donation','familia_donation','family_id','donation_id')->withPivot('amount');
    }
}
