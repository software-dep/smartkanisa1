<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;
use Illuminate\Support\Facades\Input;
use App\Member;
use App\Familia;
use App\Jumuiya;
use App\Kigango;
use App\Mtaa;

use Illuminate\Support\Facades\Redirect;
use PDF;


class Donation_reportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function report(){
         return view('pages.Report_donation');
    }


    public function search(){
        $q = Input::get('donation');
        $members = Donation::where('donation_type',$q)->get();
 


        if(count($members)>0){
            return view('pages.Donation_list',compact('members'));
        }

        else{
            return Redirect::back()

                ->with('success','No Donation with that name found, Try  again!');

        }



    }


    public function downloadpdf($id){

        $members = Donation::find($id);

         $count_member = Member::count();
         $count_family = Familia::count();
         $count_jumuiya = Jumuiya::count();
         $count_mtaa = Mtaa::count();
         $count_kigango = Kigango::count();
        

       
            $pdf = PDF::loadView('pages.pdf_d', compact('members','count_member','count_family','count_jumuiya','count_mtaa','count_kigango'));
            return $pdf->download('report.pdf');
        

    }


    public function full_report($id)
    {
      
         $members = Donation::find($id);
         $id = $id;

         $count_member = Member::count();
         $count_family = Familia::count();
         $count_jumuiya = Jumuiya::count();
         $count_mtaa = Mtaa::count();
         $count_kigango = Kigango::count();
         //dd(members);
         return view('pages.full_report',compact('members','id','count_member','count_family','count_jumuiya','count_mtaa','count_kigango'));

        
    }
}
