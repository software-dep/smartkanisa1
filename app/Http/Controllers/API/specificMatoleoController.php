<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Matoleo;
use App\General;
use App\Other;
use Validator;


class specificMatoleoController extends Controller
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


    public function view_bahasha(Request $request)
    {

        $michango = Matoleo::with('member_matoleo')->find($request->get('id'));
        return response([
            'status' => 200,
            "data" => $michango
        ]);
    }

    public function view_visonzo(Request $request)
    {
        $misa = $request->get('id');
        $michango = General::where('misa_id', $misa)->get();
        return response([
            "status" => 200,
            "data" => $michango
        ]);
    }

    public function view_harambee(Request $request)
    {
        $misa = $request->get('misa_id');
        $harambee = Other::where('misa_id', $misa)->get();

        return response([
            "status" => 200,
            "data" => $harambee
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


    //  bahasha
    public function store(Request $request)
    {


        $member = $request->get('member_id');
        $memb = Member::find($member);
        $sadaka = $request->get('sadaka');
        $shukrani = $request->get('shukrani');
        $misa = $request->get('matoleo_id');


        if ($memb->matoleo()->sync([$misa => ['sadaka' => $sadaka, 'shukrani' => $shukrani]])) {

            return response([
                'status' => 200,
                'message' => "successfully Member Record Added",

            ]);
        } else {
            return response([
                'status' => 201,
                'message' => "Fails to add Member Record! ",

            ]);
        }
    }

    public function matoleo_data_bahasha(Request $request)
    {
        $member = $request->get('member_id');
        $memb = Member::find($member);
        $sadaka = $request->get('sadaka');
        $shukrani = $request->get('shukrani');
        $misa = $request->get('matoleo_id');

        $memb->matoleo()->sync([$misa => ['sadaka' => $sadaka, 'shukrani' => $shukrani]]);


        return response([
            'status' => 200,
            'message' => "successfully Member Record Added",

        ]);
    }

    // visonzo
    public function visonzo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sadaka' => 'required'

        ]);

        if ($validator->fails()) {
            return response([
                'status' => 201,
                'message' => "Bad inpu t ! try again"
            ]);
        }



        $check_repeat = General::where('misa_id', $request->get('misa_id'))->where('kigango', $request->get('kigango'))->get();

        if (count($check_repeat) > 0) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);
        } else {


            $matoleo = new General();
            $matoleo->sadaka = request('sadaka');
            $matoleo->kigango = request('kigango');
            $matoleo->shukrani = request('shukrani');
            $matoleo->misa_id = request('misa_id');

            if ($matoleo->save()) {

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

    public function saveHarambee(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'title' => 'required',
            'kigango' => 'required'

        ]);

        if ($validator->fails()) {
            return response([
                'status' => 201,
                'message' => "Bad input ! try again"
            ]);
        }

        // bug down here
        // $check_repeat = Other::where('misa_id',$request-> get('misa_id'))->where('kigango', $request->get('kigango'))->get();

        // if (count($check_repeat) > 0) {
        //     return response([
        //         'status' => 201,
        //         'message' => "dont repeat record! try again"
        //     ]);
        // } else {

        $other = new Other();
        $other->amount = request('amount');
        $other->title = request('title');
        $other->description = request('description');
        $other->misa_id = request('misa_id');
        $other->kigango = request('kigango');

        if ($other->save()) {

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
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $general = General::find($id);

        return response([
            'status' => 200,
            'data' => $general
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

    public function Sadaka_v_update(Request $request)
    {
        // $check_repeat = General::where('kigango', $request->get('kigango'))->get();


        // if (count($check_repeat) > 1) {
        //     return response([
        //         'status' => 201,
        //         'message' => "dont repeat record! try again"
        //     ]);
        // } else {

        $get_id = $request->get('id');
        $matoleo = General::find($get_id);
        $matoleo->sadaka = $request->get('sadaka');
        $matoleo->shukrani = $request->get('shukrani');



        if ($matoleo->save()) {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $general = General::find($id);

        if ($general->delete()) {
            return response([
                'status' => 200,
                'message' => "successfully deleted!"
            ]);
        }
    }

    public function search_member(Request $request)
    {


        $q = $request->get('number');


        $member = Member::where('number', 'LIKE', '%' . $q . '%')->get();


        if (count($member) > 0) {
            return response([
                'status' => 200,
                'data' => $member
            ]);
        } else {

            return response([
                'status' => 201,
                'message' => "There is no any member with that number "
            ]);
        }
    }
}