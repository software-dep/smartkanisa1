<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Familia_Donation;
use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FamiliaDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $purposes = Donation::where('donation_type','family')->get();
        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);

        //dd($michango);


        return view('pages.FamilyDonation',compact('purposes','michango'));
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


    public function search(){
        $q = Input::get('member');
        $members = Familia::where('name','LIKE','%'.$q.'%')->get();
        $purposes = Donation::where('donation_type','family')->get();


        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);


        if(count($members)>0){
            return view('pages.FamilyDonation',compact('members','donations','purposes','michango'));
        }

        else{
            return redirect('Family-search')

                ->with('success','No Family with that name found, Try to search again!');

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member= request('member_id');





        $fams = Familia::find($member);
        $donation= request('purpose_id');
        $amount= request('amount');



        if($fams->donations()->attach([$donation=>['amount'=>$amount]])){

            return redirect('Family-Donation')

                ->with('success','Family-Donation added successfully');
        }


        else{
            return redirect('Family-Donation')

                ->with('success','Family-Donation added successfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Familia_Donation  $familia_Donation
     * @return \Illuminate\Http\Response
     */
    public function show(Familia_Donation $familia_Donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Familia_Donation  $familia_Donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Familia_Donation $familia_Donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Familia_Donation  $familia_Donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia_Donation $familia_Donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Familia_Donation  $familia_Donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia_Donation $familia_Donation)
    {
        //
    }
}
