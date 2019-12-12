<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
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
        $matoleo = new General();
        $matoleo->sadaka = request('sadaka');
        $matoleo->kigango = request('kigango');
        $matoleo->shukrani = request('shukrani');
        $matoleo->misa_id = request('misa_id');

        $check= General::where('kigango', request('kigango'))->where('misa_id',request('misa_id'))->get();
        if(count($check)>0){
            return redirect()->back()->with('success', 'Please dont repeat record! try again');
        }else{

            if ($matoleo->save()) {
                return redirect()->back()->with('success', 'Successfully ' . request('title') . '   added');
            } else {

                return redirect()->back()->with('success', ' Failed please ,Try again! ');
            }

        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function edit(General $general)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, General $general)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function destroy($general)
    {
        $matoleo = General::find($general);  
        if($matoleo->delete()){
            // return redirect()->back()->with('success', 'Successfully  record has been deleted');
            dd("done");
        }else{
            // return redirect()->back()->with('success', 'Fail to delete record');
            dd('fails');
        }

        
    }
}
