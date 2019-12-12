<?php

namespace App\Http\Controllers;

use App\Jumuiya;
use App\Jumuiya_Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Donation;

class JumuiyaDonationController extends Controller
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

        $purposes = Donation::where('donation_type','jumuiya')->get();
        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);

        //dd($michango);



        return view('pages.JumuiyaDonation',compact('purposes','michango'));
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
        $member= request('member_id');
        $fams = Jumuiya::find($member);
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

    public function search(){
        $q = Input::get('member');
        $members = Jumuiya::where('name','LIKE','%'.$q.'%')->get();
        $purposes = Donation::where('donation_type','jumuiya')->get();


        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);


        if(count($members)>0){
            return view('pages.JumuiyaDonation',compact('members','donations','purposes','michango'));
        }

        else{
            return redirect('Jumuiya-search')

                ->with('success','No Family with that name found, Try to search again!');

        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Jumuiya_Donation  $jumuiya_Donation
     * @return \Illuminate\Http\Response
     */
    public function show(Jumuiya_Donation $jumuiya_Donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jumuiya_Donation  $jumuiya_Donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Jumuiya_Donation $jumuiya_Donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jumuiya_Donation  $jumuiya_Donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jumuiya_Donation $jumuiya_Donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jumuiya_Donation  $jumuiya_Donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jumuiya_Donation $jumuiya_Donation)
    {
        //
    }
}
