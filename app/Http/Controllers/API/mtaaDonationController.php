<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mtaa;
use App\Donation;

class mtaaDonationController extends Controller
{

    public function select(){
    


        $purposes = Donation::where('donation_type','Mtaa')->get();

        return response([
            "message"=>" Successfully getting data",
            "status"=>" 200",
            "data"=>$purposes
        ]);
    }

    public function memberList(Request $request){
    


        $donation_id = $request->get('id');

        $michango = Donation::with('mtaa')->find($donation_id);
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
      
        $mtaa= $request->get('mtaa_id');

        $donations = Mtaa::find($mtaa);
        $donation= $request->get('donation');
        $amount= $request->get('amount');

        if($donations->donations()->sync([$donation => ['amount'=>$amount]]) ){

            return response([
                'status' => 200,
                'message' => "successfully Street Record Added",

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
        

        $donations = Mtaa::find($id);
        

        if ($donations->donations()->detach()) {

            return response([
                'status' => 200,
                'message' => "successfully Street  Record Deleted",

            ]);
        } else {
            return response([
                'status' => 201,
                'message' => "Fails to delete Record! ",

            ]);
        }
    }

       public function search_mtaa(Request $request){

    
        $q = $request->get('name');


        $mtaa = Mtaa::with('kigango')->where('name', 'LIKE', '%' . $q . '%')->get();


        if (count($mtaa) > 0) {
            return response([
                'status' => 200,
                'data' =>$mtaa
            ]);
        } else {

            return response([
                'status' => 201,
                'message' => "There is no Street with that name"
            ]);
        }

    }
}
