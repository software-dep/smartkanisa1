<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Familia;
use App\Member;

use Validator;

class WauminiController extends Controller
{


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search()
    {
        $q = Input::get('name');
        $family = Familia::with('jumuiya','jumuiya.mtaa')->where('name', 'LIKE', '%' . $q . '%')->get();


        if (count($family) > 0) {
            
            return response([
                'status' => 200,
                'data' => $family
            ]);
        } else {
           
            return response([
                'status' => 404,
                'data' => "no data found"
            ]);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'baba' => 'required|string',
            'mama' => 'required|string',
            'familia_id' => 'required',
            'gender' => 'required',
            'mahali' => 'required',
            'birthdate' => 'required',
            'number' =>'unique'
            

      
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 201,
                'message' => "Bad input !Fill all required field and try again"
            ]);
        }


        // check values
        $baptized = $request->get('baptized');
        $communion = $request->get('communion');
        $confimation = $request->get('confimation');
        $marriage = $request->get('marriage');

        $check_repeat = Member::where('name', $request->get('name'))->where('familia_id', $request->get('familia_id'))->get();
               if (count($check_repeat) > 0) {
                   return response([
                     'status' => 404,
                     'message' => "dont repeat record! try again"
                  ]);

        } else {

            $member = new Member();

           // generate No
        $latestMember = Member::orderBy('created_at', 'DESC')->first();
        if ($latestMember == null) {
            $member->number = 101;
        } else {
            $new = $latestMember->id + 101;
                $member->number = ($latestMember->id + 101);
                $check_number = Member::where('number', $new)->get();
                if(count($check_number) > 0)
                {
                    return response([
                        'status' => 404,
                        'message' => "please wait and add again! "
                    ]);
                }

                else{
                    $member->number = ($latestMember->id + 101);
                }
        }
        


      // personal details
        $member->name = $request->get('name');
        $member->baba = $request->get('baba');
        $member->mama = $request->get('mama');
        $member->gender = $request->get('gender');
        $member->mahali = $request->get('mahali');
        $member->familia_id = $request->get('familia_id');
        $member->tarehe_kuzaliwa = $request->get('birthdate');
        $member->status =true;
       
    //    BABTIZED DETAILS
        $member->mji = $request->get('name');
        $member->tarehe_kubatizwa = $request->get('tarehe_kubatizwa');
        $member->no_ubatizo = $request->get('no_ubatizo');
        $member->parokia_ubatizo = $request->get('parokia_ubatizo');
        $member->msimamizi_ubatizo = $request->get('msimamizi_ubatizo');

        if($baptized == false){
            $member->mji ="-";
            $member->tarehe_kubatizwa = "0001-01-01";
            $member->no_ubatizo = "00";
            $member->parokia_ubatizo = "-";
            $member->msimamizi_ubatizo = "-";

        }


        // kOMUNYO YA KWANZA
        $member->komunyo_ya_kwanza = $request->get('komunyo_ya_kwanza');
        $member->komunyo_parish = $request->get('komunyo_parish');
             if($communion == false){
                  $member->komunyo_ya_kwanza = "0001-01-01";
                  $member->komunyo_parish = "-";
             }


       //KIPAIMARA 
        $member->kipaimara = $request->get('kipaimara');
        $member->no_kipaimara = $request->get('no_kipaimara');
        $member->parokia_kipaimara = $request->get('parokia_kipaimara');
               if($confimation==false){
                    $member->kipaimara = "0001-01-01";
                    $member->no_kipaimara = "-";
                    $member->parokia_kipaimara = "-";

        }


       //NDOA 
        $member->tarehe_ndoa = $request->get('tarehe_ndoa');
        $member->no_ndoa = $request->get('no_ndoa');
        $member->parokia_ndoa = $request->get('parokia_ndoa');
        $member->partiner = $request->get('partiner');
            if($marriage==false){
            $member->tarehe_ndoa = "0001-01-01";
            $member->no_ndoa = "-";
            $member->parokia_ndoa = "-";
            $member->partiner = "-";
            }



        if ($member->save()) {

            return response([
                'status' => 200,
                'message' => "successfully added"
            ]);
        } else {
            return response([
                'status' => 404,
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
        //
    }
}
