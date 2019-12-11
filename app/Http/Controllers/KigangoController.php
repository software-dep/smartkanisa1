<?php

namespace App\Http\Controllers;


use App\Kigango;
use App\Parokia;
use Illuminate\Http\Request;

class KigangoController extends Controller
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
     //$vigango = Kigango::with('parokia')->orderBy('id', 'desc')->Paginate(10);
     $vigango = Kigango::with('parokia')->sortable()->paginate(10);
        return view('pages.vigango',compact('parishs','vigango'));
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
        $kigango = new Kigango();
        $kigango->name= request('outstation');
        $kigango->parokis_id= request('parokia_id');


        if(  $kigango->save()){

            return redirect('Vigango')

                ->with('success','Outstions added successfully');
        }


        else{
            return redirect('Vigango')

                ->with('success','sorry try again');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kigango  $kigango
     * @return \Illuminate\Http\Response
     */
    public function show(Kigango $kigango)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kigango  $kigango
     * @return \Illuminate\Http\Response
     */
    public function edit( $kigango)
    {
        $kigango= Kigango::with('parokia')->find($kigango);
        $parishs = Parokia::all();

        return view('edit.kigango_Edit',compact('kigango','parishs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kigango  $kigango
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $kigango)
    {
        $kigango = Kigango::find($kigango);

        $kigango->name= request('kigango');
        $kigango->parokis_id= request('parokia_id');


        if( $kigango-> save() ){

            return redirect('Vigango')

                ->with('success','Outstation updated successfully');
        }

        else{

            return redirect('Vigango')

                ->with('success','Outstation fails to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kigango  $kigango
     * @return \Illuminate\Http\Response
     */
    public function destroy($kigango)
    {
        $kigango = Kigango::find($kigango);

        $kigango->delete();

        return redirect('Vigango')->with('success','kigango has been  deleted');
    }
}
