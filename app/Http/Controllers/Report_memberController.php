<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Report_memberController extends Controller


{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function memberReport(){
        return view('pages.member_Report');
    }
}
