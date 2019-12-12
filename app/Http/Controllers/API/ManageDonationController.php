<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donation; 
use Validator;
class ManageDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $donation = Donation::orderBy('id','desc')-> Paginate(10);
        return response([
            'message' => 'successfully',
            'status' => 200,
            'data' => $donation
        ]);
    
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
        $validator = Validator::make($request->all(),[
             'name' => 'required|string',
            'donation_type' => 'required',
            'amount' => 'required'
        ]);

        if($validator->fails()){
             return response([
                'status' => 201,
                'message' =>"Bad  input !try again "
            ]);
        }



        $check_repeat = Donation::where('name', $request->get('name'))->where('donation_type', $request->get('donation_type'))->get();

        if (count($check_repeat) > 0) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);
        } else {


            $donation = new Donation();
            $donation->name = $request->get('name');
            $donation->donation_type = $request->get( 'donation_type');
            $donation->amount = $request->get('amount');

            if ($donation->save()) {

                return response([
                    'status' => 200,
                    'message' => "successfully added"
                ]);
            } else {
                return response([
                    'status' => 500,
                    'message' => "failed"
                ]);
            }


        }
    }



    public function update_donations(Request $request)
    {


        $check_repeat = Donation::where('name', $request->get('name'))->get();


        if (count($check_repeat) > 1) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);
        } else {

            $get_id = $request->get('id');
            $kigango = Donation::find($get_id);
            $kigango->name = $request->get('name');
            $kigango->donation_type = $request->get('donation_type');
            $kigango->amount = $request->get('amount');


            if ($kigango->save()) {
                return response([
                    'status' => 200,
                    'message' => "successfully updated"
                ]);
            } else {
                return response([
                    'status' => 500,
                    'message' => "failed"
                ]);
            }
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
        $donation = Donation::find($id);

        return response([
            'status' => 200,
            'data' => $donation
        ]);
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
        $donation = Donation::find($id);

        if ($donation->delete()) {
            return response([
                'status' => 200,
                'message' => "successfully deleted!"
            ]);
        } else {
            return response([
                'status' => 500,
                'message' => "fails to delete"
            ]);
        }
    }
}
