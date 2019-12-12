<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Member;
use App\Member_Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MemberDonationController extends Controller
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
        $purposes = Donation::where('donation_type','member')->get();
        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);
        $members = Member::find('member_m_id');





        //dd($donations);
        return view('pages.MemberDonation',compact('purposes','michango','members'));
    }


    public function search(){
        $q = Input::get('member');
        $members = Member::where('name','LIKE','%'.$q.'%')->get();
        $purposes = Donation::where('donation_type','member')->get();
        $donations = Member_Donation::all();

        $donation_id = Input::get('donation_id');
        $michango = Donation::find($donation_id);


        if(count($members)>0){
            return view('pages.MemberDonation',compact('members','donations','purposes','michango'));
        }

        else{
            return redirect('Member-search')

                ->with('success','No Member with that name found, Try to search again!');

        }

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
     * @param  \Illuminate\Http\Request  $requestf
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $member= request('member_id');





        $donations = Member::find($member);
        $donation= request('purpose_id');
        $amount= request('amount');

        if($donations->donations()->sync([$donation => ['amount'=>$amount]])){

            return redirect('Member-Donation')

                ->with('success','Member-Donation added successfully');
        }


        else{
            return redirect('Member-Donation')

                ->with('success','Member-Donation added successfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member_Donation  $member_Donation
     * @return \Illuminate\Http\Response
     */
    public function show(Member_Donation $member_Donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member_Donation  $member_Donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Member_Donation $member_Donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member_Donation  $member_Donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member_Donation $member_Donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member_Donation  $member_Donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member_Donation $member_Donation)
    {
        //
    }
}
