<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Matoleo;
use App\Member;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PDF;

class ReportMatoleoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('auth');
    }


    public function index()
    {
       // $date =Carbon::today();
        return view('pages.matoleo_report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

     public function search()
    {
        $from = Input::get('from');
        $to =Input::get('to');
        $except = Input::get('except');

        $matoleo = Matoleo::with('general', 'harambee','member_matoleo')->whereBetween('date',[$from,$to])->where('date','!=',$except)->get();

      

        if (count($matoleo) > 0) {

         
            return view('pages.matoleo_report', compact('matoleo','from','to','except'));
        } else {
            return redirect('matoleo_report')

                ->with('success', ' No details  found with that range, Try to search again!');

        }

    }

    public function pdfgenerate(){
         $from = Input::get('from');
          $to =Input::get('to');
          $except =Input::get('except');

 $matoleo = Matoleo::with('general', 'harambee','member_matoleo')->whereBetween('date',[$from,$to])->where('date', '!=', $except)->get();


           
        if (count($matoleo) > 0) {
            $pdf = PDF::loadView('pages.pdf_report_matoleo', compact('matoleo','to','from'));
            return $pdf->download('BugandoParish_matoleo.pdf');
            


         } else {
            return redirect('matoleo_report')

                ->with('success', ' No details  found with that range, Try to search again!');

        }
        

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
