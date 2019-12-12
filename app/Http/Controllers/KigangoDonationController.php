<?php

namespace App\Http\Controllers;

use App\Kigango;
use App\Donation;
use App\Kigango_Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class KigangoDonationController extends Controller
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
        $purposes = Donation::where('donation_type','kigango')->get();
        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);

        return view('pages.KigangoDonation',compact('purposes','michango'));
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

    public function search(){
        $q = Input::get('member');
        $members = Kigango::where('name','LIKE','%'.$q.'%')->get();
        $purposes = Donation::where('donation_type','kigango')->get();


        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);


        if(count($members)>0){
            return view('pages.KigangoDonation',compact('members','donations','purposes','michango'));
        }

        else{
            return redirect('Vigango-search')

                ->with('success','No Kigango with that name found, Try to search again!');

        }

    }

    public function store(Request $request)
    {
        $member= request('member_id');





        $fams = Kigango::find($member);
        $donation= request('purpose_id');
        $amount= request('amount');



        if($fams->donations()->sync([$donation=>['amount'=>$amount]])){

            return redirect('Jumuiya-Donation')

                ->with('success','Jumuiya-Donation added successfully');
        }


        else{
            return redirect('Jumuiya-Donation')

                ->with('success','Jumuiya-Donation added successfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kigango_Donation  $kigango_Donation
     * @return \Illuminate\Http\Response
     */
    public function show(Kigango_Donation $kigango_Donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kigango_Donation  $kigango_Donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Kigango_Donation $kigango_Donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kigango_Donation  $kigango_Donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kigango_Donation $kigango_Donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kigango_Donation  $kigango_Donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kigango_Donation $kigango_Donation)
    {
        //
    }
}
