<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donation;
use App\Member;
use App\Member_Donation;

class MemberDonationController extends Controller
{
    
    public function select(){
        $purposes = Donation::where('donation_type','Member') ->get();

        return response([
            "message"=>"succefully getting data",
            "status"=>"200",
            "data"=>$purposes
        ]);
    }

    public function memberList(Request $request){
      $donation_id = $request->get('id');

        $michango = Donation::with('members')->find($donation_id); 
            return response([
                'status' => 200,
                'data' => $michango

            ]);

     
        
    }

    public function index()
    {
        //
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
        $member= $request->get('member_id');
        $donations = Member::find($member);
        $donation= $request->get('donation');
        $amount= $request->get('amount');

        if($donations->donations()->sync([$donation => ['amount'=>$amount]])){

            return response([
                'status' => 200,
                'message' => "successfully Member Record Added",
                
            ]);
        } else{
            return response([
                'status' => 201,
                'message' => "Fails to add Member Record! ",

            ]);

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
        $donations = Member::find($id);
        if ($donations->donations()->detach()) {

            return response([
                'status' => 200,
                'message' => "successfully   Record Deleted",

            ]);
        } else {
            return response([
                'status' => 201,
                'message' => "Fails to delete Record! ",

            ]);
        }
    }


    public function search_member(Request $request){
   
         $q = $request->get('number');


        $member = Member::where('number', 'LIKE', '%' . $q . '%')->get();


        if (count($member) > 0) {
            return response([
                'status' => 200,
                'data' =>$member
            ]);
        } else {

            return response([
                'status' => 201,
                'message' => "There is no any member with that number "
            ]);
        }

    }
}
