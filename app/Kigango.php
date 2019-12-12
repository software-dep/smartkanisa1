<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Kigango extends Model
{

    use Sortable;
    public $Sortable = ['id','name'];

    public function  parokia(){
        return $this->belongsTo('App\Parokia','parokis_id');
    }


    public function mtaa(){
        return $this->hasMany('App\Mtaa','kigango_id');
    }

    public function donations()
    {
        return  $this->belongsToMany('App\Donation','donation_kigango','kigango_id','donation_id')->withPivot('amount');
    }
}
