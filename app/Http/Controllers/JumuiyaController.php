<?php

namespace App\Http\Controllers;

use App\Jumuiya;
use App\Mtaa;
use Illuminate\Http\Request;

class JumuiyaController extends Controller
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

        $streets = Mtaa::all();
        $jumuiya = Jumuiya::with('mtaa')->orderBy('id', 'desc')->Paginate(7);
        return view('pages.jumuiya',compact('streets','jumuiya'));
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
        $jumuiya = new Jumuiya();
        $jumuiya->name= request('name');
        $jumuiya->mtaa_id= request('mitaa_id');


        if(  $jumuiya->save()){

            return redirect('Jumuiya')

                ->with('success','Jumuiya added successfully');
        }


        else{
            return redirect('Jumuiya')

                ->with('success','sorry try again');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jumuiya  $jumuiya
     * @return \Illuminate\Http\Response
     */
    public function show(Jumuiya $jumuiya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jumuiya  $jumuiya
     * @return \Illuminate\Http\Response
     */
    public function edit( $jumuiya)
    {
        $jumuiya= Jumuiya::with('mtaa')->find($jumuiya);
        $mitaa = Mtaa::all();

        return view('edit.jumuiya',compact('jumuiya','mitaa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jumuiya  $jumuiya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $jumuiya)
    {
        $jumuiya = Jumuiya::find($jumuiya);
        $jumuiya->name= request('name');
        $jumuiya->mtaa_id= request('mtaa_id');

        if( $jumuiya-> save() ){

            return redirect('Jumuiya')

                ->with('success','Community updated successfully');
        }

        else{

            return redirect('Jumuiya')

                ->with('success','Community fails to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jumuiya  $jumuiya
     * @return \Illuminate\Http\Response
     */
    public function destroy($jumuiya)
    {
        $jumuiya = Jumuiya::find($jumuiya);

        $jumuiya->delete();

        return redirect('Jumuiya')->with('success','Jumuiya has been  deleted');
    }
}
