<?php

namespace App\Http\Controllers;

use App\Parokia;
use Illuminate\Http\Request;

class ParokiaController extends Controller
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

        $parishs = Parokia::all();

        return view('pages.parokia',compact('parishs'));

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
        $parish = new Parokia();
        $parish->name= request('parish');


        if(  $parish->save()){

            return redirect('Parokia')

                ->with('success','parish added successfully');
        }


        else{
            return redirect('Parokia')

                ->with('success','sorry try again');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parokia  $parokia
     * @return \Illuminate\Http\Response
     */
    public function show(Parokia $parokia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parokia  $parokia
     * @return \Illuminate\Http\Response
     */
    public function edit( $parokia)
    {
        $parish= Parokia::find($parokia);

        return view('edit.parish_Edit',compact('parish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parokia  $parokia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $parokia)
    {
        $parokia = Parokia::find($parokia);

        $parokia ->name = request('parish');


        if( $parokia-> save() ){

            return redirect('Parokia')

                ->with('success','Parish updated successfully');
        }

        else{

            return redirect('Parish')

                ->with('success','Parish fails to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parokia  $parokia
     * @return \Illuminate\Http\Response
     */
    public function destroy( $parokia)
    {
        $parokia = Parokia::find($parokia);

        $parokia->delete();
        return redirect('Parokia')->with('success','Parokia has been  deleted');
    }
}
