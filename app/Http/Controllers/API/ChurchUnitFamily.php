<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Familia;
use Validator;

class ChurchUnitFamily extends Controller
{


    // get jumiya data
    public function getFamily()
    {
        $jumuiya = Familia::with('jumuiya', 'jumuiya.mtaa', 'jumuiya.mtaa.kigango')->orderBy('id', 'desc')->paginate(10);

        return response([
            'status' => 200,
            'message' => "successfully ",
            'data' => $jumuiya
        ]);
    }

    public function arrangevigango(Request $request)
    {
        $order = $request->get('rule');
        $jumuiya = Familia::with('jumuiya', 'jumuiya.mtaa', 'jumuiya.mtaa.kigango')->orderBy('name', $order)->paginate(10);
        return response([
            'status' => 200,
            'message' => "successfully ",
            'data' => $jumuiya
        ]);
    }

    public function insertData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'jumuiya_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 201,
                'message' => "Bad input ! try again"
            ]);
        }

        $check_repeat = Familia::where('name', $request->get('name'))->where('jumuiya_id', $request->get('jumuiya_id'))->get();


        if (count($check_repeat) > 0) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);
        } else {

            //    function
            $family = new Familia();
            $family->name = $request->get('name');
            $family->jumuiya_id = $request->get('jumuiya_id');


            if ($family->save()) {

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


    public function destroy($family)
    {
        $family = Familia::find($family);

        if ($family->delete()) {
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

    public function show($family)
    {
        $family = Familia::find($family);

        return response([
            'status' => 200,
            'data' => $family
        ]);
    }



    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'jumuiya_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 201,
                'message' => "Bad input! try again"
            ]);
        }

        $check_repeat = Familia::where('name', $request->get('name'))->where('jumuiya_id', $request->get('jumuiya_id'))->get();


        if (count($check_repeat) > 0) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);
        } else {




            $get_id = $request->get('id');
            $family = Familia::find($get_id);
            $family->name = $request->get('name');
            $family->jumuiya_id = $request->get('jumuiya_id');


            if ($family->save()) {

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


    public function search_family(Request $request)
    {
        $q = $request->get('name');
        $family = Familia::with('jumuiya', 'jumuiya.mtaa', 'jumuiya.mtaa.kigango')->where('name', 'LIKE', '%' . $q . '%')->get();
        // $family = Familia::where('name', 'LIKE', '%' . $q . '%')->get();

        if (count($family) > 0) {
            return response([
                'status' => 200,
                'data' => $family
            ]);
        } else {
            return response([
                'status' => 201,
                'data' => 'no data found'
            ]);
        }
    }
}