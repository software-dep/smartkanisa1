<?php

namespace App\Http\Controllers;

use App\Mtaa;
use App\Mtaa_Donation;
use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MtaaDonationController extends Controller
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
        $purposes = Donation::where('donation_type','mtaa')->get();
        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);

        //dd($michango);



        return view('pages.StreetDonation',compact('purposes','michango'));
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
        $members = Mtaa::where('name','LIKE','%'.$q.'%')->get();
        $purposes = Donation::where('donation_type','mtaa')->get();


        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);


        if(count($members)>0){
            return view('pages.StreetDonation',compact('members','donations','purposes','michango'));
        }

        else{
            return redirect('Street-search')

                ->with('success','No Street with that name found, Try to search again!');

        }

    }


    public function store(Request $request)
    {
        $member= request('member_id');





        $fams = Mtaa::find($member);
        $donation= request('purpose_id');
        $amount= request('amount');



        if($fams->donations()->sync([$donation=>['amount'=>$amount]])){

            return redirect('Street-Donation')

                ->with('success','Street-Donation added successfully');
        }


        else{
            return redirect('Street-Donation')

                ->with('success','Street-Donation added successfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mtaa_Donation  $mtaa_Donation
     * @return \Illuminate\Http\Response
     */
    public function show(Mtaa_Donation $mtaa_Donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mtaa_Donation  $mtaa_Donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Mtaa_Donation $mtaa_Donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mtaa_Donation  $mtaa_Donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mtaa_Donation $mtaa_Donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mtaa_Donation  $mtaa_Donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mtaa_Donation $mtaa_Donation)
    {
        //
    }
}
