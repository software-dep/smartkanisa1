<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kigango;
use App\Parokia;

use Validator;

class churchUnitVigango extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vigango = Kigango::with('parokia')->orderBy('id', 'desc')->Paginate(10);

        return response([
            'message' => 'successfully',
            'status' => 200,
            'data' => $vigango
        ]);
    }



 public function getparokia()
{
    $parokia = Parokia::all();

        return response([
            'message' => 'successfully',
            'status' => 200,
            'data' => $parokia
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
                          'parokia_id' => 'required'
                          
                         ]);

        if($validator->fails()){
            return response([
                'status' => 201,
                'message' =>"Bad input ! try again"
            ]);
        }



        $check_repeat = Kigango::where('name', $request->get('name'))->where('parokis_id', $request->get('parokia_id'))->get();

        if (count($check_repeat) > 0) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);

        } else {

          
             $kigango = new Kigango();
             $kigango->name = $request->get('name');
             $kigango->parokis_id = $request->get('parokia_id');
             

              if ($kigango->save()) {

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
         $kigango = Kigango::find($id);

        return response([
            'status' => 200,
            'data' => $kigango
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
    public function update_kigango(Request $request)
    {
        

           $check_repeat = Kigango::where('name', $request->get('name'))->get();


        if (count($check_repeat) > 1) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);

        } else {

        $get_id = $request->get('id');
        $kigango = Kigango::find($get_id);
        $kigango->name = $request->get('name');
        $kigango->parokis_id = $request->get('parokia_id');
      


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
        $kigango = Kigango::find($id);

        if ($kigango->delete()) {
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
