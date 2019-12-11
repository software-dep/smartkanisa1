<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public  function family(){
        return $this->belongsTo('App\Familia','familia_id');
    }

    public function donations()
    {
        return  $this->belongsToMany('App\Donation','donation_member','member_m_id','donation_m_id')->withPivot('amount');
    }


    public function matoleo()
    {
        return $this->belongsToMany('App\Matoleo', 'matoleo_member', 'member_id', 'matoleo_id')->withPivot('sadaka','shukrani');
    }
}
