<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mtaa;
use App\Kigango;
use Validator;

class churchUnitMitaa extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitaa = Mtaa::with('kigango')->orderBy('id', 'desc')->Paginate(10);

        return response([
            'message' => 'successfully',
            'status' => 200,
            'data' => $mitaa
        ]);
    }


    public function get_vigango(){
   
         $vigango = Kigango::all();
        return response([
            'message' => 'successfully',
            'status' => 200,
            'data' => $vigango
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
            'kigango' => 'required'
            
        ]);

        if($validator->fails()){
             return response([
                'status' => 201,
                'message' =>"Bad  input ! try again"
            ]);
        }



        $check_repeat = Mtaa::where('name', $request->get('name'))->where('kigango_id', $request->get('kigango'))->get();

        if (count($check_repeat) > 0) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);
        } else {


            $mtaa = new Mtaa();
            $mtaa->name = $request->get('name');
            $mtaa->kigango_id = $request->get('kigango');
           

            if ($mtaa->save()) {

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mtaa = Mtaa::find($id);

        return response([
            'status' => 200,
            'data' => $mtaa
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


    public function update_mtaa(Request $request)
    {


        $check_repeat = Mtaa::where('name', $request->get('name'))->get();


        if (count($check_repeat) > 1) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);
        } else {

            $get_id = $request->get('id');
            $kigango = Mtaa::find($get_id);
            $kigango->name = $request->get('name');
            $kigango->kigango_id = $request->get('kigango');
      


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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mtaa = Mtaa::find($id);

        if ($mtaa->delete()) {
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
    public function search_street1(Request $request)
    {
        $q = $request->get('name');
        $street = Mtaa::with('kigango')->where('name', 'LIKE', '%' . $q . '%')->get();
        // $family = Familia::where('name', 'LIKE', '%' . $q . '%')->get();

        if (count($street) > 0) {
            return response([
                'status' => 200,
                'data' => $street
            ]);
        } else {
            return response([
                'status' => 201,
                'data' => 'no data found'
            ]);
        }
    }
}
