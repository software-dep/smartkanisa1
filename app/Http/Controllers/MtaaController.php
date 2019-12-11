<?php

namespace App\Http\Controllers;

use App\Kigango;
use App\Mtaa;
use Illuminate\Http\Request;

class MtaaController extends Controller
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
        $vigango = Kigango::all();
        $mitaa = Mtaa::with('kigango')->orderBy('id', 'desc')->Paginate(5);
        return view('pages.mitaa',compact('vigango','mitaa'));
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
        $mtaa = new Mtaa();
        $mtaa->name= request('street');
        $mtaa->kigango_id= request('vigango_id');


        if(  $mtaa->save()){

            return redirect('Mitaa')

                ->with('success','Street added successfully');
        }


        else{
            return redirect('Mitaa')

                ->with('success','sorry try again');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mtaa  $mtaa
     * @return \Illuminate\Http\Response
     */
    public function show(Mtaa $mtaa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mtaa  $mtaa
     * @return \Illuminate\Http\Response
     */
    public function edit( $mtaa)
    {  $mtaa= Mtaa::with('kigango')->find($mtaa);
       $vigango = Kigango::all();

        return view('edit.mtaa',compact('mtaa','vigango'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mtaa  $mtaa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mtaa)
    {
        $mtaa = Mtaa::find($mtaa);

        $mtaa->name = request('street');
        $mtaa->kigango_id = request('vigango_id');


        if( $mtaa->save() ){

            return redirect('Mitaa')

                ->with('success','Street updated successfully');
        }

        else{

            return redirect('Mitaa')

                ->with('success','Street fails to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mtaa  $mtaa
     * @return \Illuminate\Http\Response
     */
    public function destroy( $mtaa)
    {
        $mtaa = Mtaa::find($mtaa);

        $mtaa->delete();
        return redirect('Mitaa')->with('success','Street has been  deleted');
    }
}
