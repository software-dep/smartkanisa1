<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function contact(){
        return view('pages.contact');
    }

    public function add_contact(){
        return view('pages.add_leader_contact');
    }
}
