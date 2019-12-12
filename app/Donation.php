<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function members()
    {
        return  $this->belongsToMany('App\Member','donation_member','donation_m_id','member_m_id')->withPivot('amount');
    }


    public function families()
    {
        return  $this->belongsToMany('App\Familia','familia_donation','donation_id','family_id')->withPivot('amount');
    }



    public function jumuiya()
    {
        return  $this->belongsToMany('App\Jumuiya','donation_jumuiya','donation_id','jumuiya_id')->withPivot('amount');
    }


    public function kigango()
    {
        return  $this->belongsToMany('App\Kigango','donation_kigango','donation_id','kigango_id')->withPivot('amount');
    }


    public function mtaa()
    {
        return  $this->belongsToMany('App\Mtaa','donation_mtaa','donation_id','mtaa_id')->withPivot('amount');
    }
}
