<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Familia;
use App\Jumuiya;
use App\Mtaa;
use App\Kigango;
use App\Donation;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     
        $count_member = Member::count();
        $count_family = Familia::count();
        $count_jumuiya = Jumuiya::count();
        $count_mtaa = Mtaa::count();
        $count_kigango = Kigango::count();
        $vigango = Kigango::orderBy('name','asc')->get();
        $michango = Donation::orderBy('created_at','desc')->paginate(7);
        //$vigango = Member::with('family','family')->orderBy('name','asc')->get();
        return view('home',compact('count_member','count_jumuiya','count_kigango','count_mtaa','count_family','vigango','michango'));
    }



    public function add_new_member()
    {
        return view('pages.add_new_member');
    }
}
