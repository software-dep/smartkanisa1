<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Matoleo;
use Validator;

class MatoleoLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matoleo = Matoleo::OrderBy('date', 'desc')->Paginate(5);
      
        return response([
                      'status'=>200,
                      'message'=>'matoleo data',
                      'data'=>$matoleo
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
             'date' => 'required',
            
        ]);

        if($validator->fails()){
             return response([
                'status' => 201,
                'message' =>"Bad   input !try again "
            ]);
        }



        $check_repeat = Matoleo::where('date', $request->get('date'))->get();

        if (count($check_repeat) > 0) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);
        } else {


            $matoleo = new Matoleo();
            $matoleo->date = $request->get('date');

            if ($matoleo->save()) {

                return response([
                    'status' => 200,
                    'message' => "successfully date has been added"
                ]);
            } else {
                return response([
                    'status' => 500,
                    'message' => "failed to add record"
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
        $matoleo = Matoleo::find($id);

        return response([
            'status' => 200,
            'data' => $matoleo
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
    public function update(Request $request)
    {
       
    }
    public function matoleo_update(Request $request){
    $check_repeat = Matoleo::where('date', $request->get('date'))->get();


    if (count($check_repeat) > 1) {
        return response([
            'status' => 201,
            'message' => "dont repeat record! try again"
        ]);
    } else {

        $get_id = $request->get('id');
        $matoleo = Matoleo::find($get_id);
        $matoleo->date = $request->get('date');



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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matoleo = Matoleo::find($id);

        if ($matoleo->delete()) {
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
