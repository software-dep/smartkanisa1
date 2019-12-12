<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtaa extends Model
{
    public function kigango()
    {
        return $this->belongsTo('App\Kigango','kigango_id');
    }


    public function jumuiya()
    {
        return $this->hasMany('App\Jumuiya','mtaa_id');
    }

    public function donations()
    {
        return  $this->belongsToMany('App\Donation','donation_mtaa','mtaa_id','donation_id')->withPivot('amount');
    }
}
