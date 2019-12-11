<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
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
        $donations = DB::table('donations')->simplePaginate(5);
        return view('pages.donation',compact('donations'));
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
        $donation = new Donation();
        $donation->name= request('name');
        $donation->donation_type =request('donation_type');
        $donation->amount =request('amount');

        if(  $donation->save()){

            return redirect('Donation')

                ->with('success','Donation added successfully');
        }


        else{
            return redirect('Donation')

                ->with('success','sorry try again');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit( $donation)
    {
        $donation= Donation::find($donation);


        return view('edit.donation',compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$donation)
    {
        $donation = Donation::find($donation);

        $donation->name= request('name');
        $donation->donation_type =request('donation_type');
        $donation->amount =request('amount');


        if( $donation-> save() ){

            return redirect('Donation')

                ->with('success','Donation updated successfully');
        }

        else{

            return redirect('Donation')

                ->with('success','Donation fails to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($donation)
    {
        $don = Donation::find($donation);
        $don->delete();
        return redirect('Donation')->with('success','Donation has been  deleted');


    }
}
