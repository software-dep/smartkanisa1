<?php

namespace App\Http\Controllers;

use App\Other;
use Illuminate\Http\Request;
use App\Matoleo;

class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $matoleo = new Other();

        $matoleo->title = request('title');
        $matoleo->description =request('description');
        $matoleo->kigango = request('kigango');
        $matoleo->amount =request('amount');
        // $matoleo->misa = request('misa');
        $matoleo->misa_id = request('misa_id');

        if($matoleo->save()){

            return redirect()->back()->with('success', 'Successfully '. request('title').'   added');

        }
        else{

            return redirect()->back()->with('success', ' Failed please ,Try again! ');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function show(Other $other)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function edit(Other $other)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Other $other)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function destroy(Other $other)
    {
        //
    }
}
