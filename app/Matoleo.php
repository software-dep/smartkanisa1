<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matoleo extends Model
{
    public function general(){
        return $this->hasMany('App\General','misa_id');
    }


    public function harambee()
    {
        return $this->hasMany('App\Other', 'misa_id');
    }

    public function member_matoleo()
    {
        return $this->belongsToMany('App\Member', 'matoleo_member', 'matoleo_id', 'member_id')->withPivot('sadaka', 'shukrani');
    }
}
