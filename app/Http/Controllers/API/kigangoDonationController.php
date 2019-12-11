<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kigango;
use App\Donation;

class kigangoDonationController extends Controller
{

    public function select(){
    

        $purposes = Donation::where('donation_type','Kigango')->get();

        return response([
            "message"=>"Successfully getting data",
            "status"=>"200",
            "data"=>$purposes
        ]);
    }

    public function memberList(Request $request){
    



        $donation_id = $request->get('id');

        $michango = Donation::with('kigango')->find($donation_id);
        return response([
            'status' => 200,
            'data'=>$michango

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $kigango= $request->get('kigango_id');
        $donations = Kigango::find($kigango);
        $donation= $request->get('donation');
        $amount= $request->get('amount');

        if($donations->donations()->sync([$donation => ['amount'=>$amount]])){

             return response([
                'status' => 200,
                'message' => "successfully Kigango Record Added",

            ]);
        } else{
             return response([
                'status' => 201,
                'message' => "Fails to save Record! ",

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
        $donations = Kigango::find($id);
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



    //       public function search_mtaa(Request $request){

    
    //     $q = $request->get('name');


    //     $kigango = Kigango::where('name', 'LIKE', '%' . $q . '%')->get();


    //     if (count($kigango) > 0) {
    //         return response([
    //             'status' => 200,
    //             'data' =>$kigango
    //         ]);
    //     } else {

    //         return response([
    //             'status' => 201,
    //             'message' => "There is no Street with that name"
    //         ]);
    //     }

    // }
}
