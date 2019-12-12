<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Jumuiya;
use Illuminate\Http\Request;

class FamiliaController extends Controller
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
        $jumuiya = Jumuiya::all();
        $familia = Familia::with('jumuiya')->orderBy('id','desc')->Paginate(10);
        return view('pages.familia',compact('jumuiya','familia'));
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
        $familia = new Familia();
        $familia->name= request('name');
        $familia->jumuiya_id= request('jumuiya_id');

     $id= request('jumuiya_id');


        if(  $familia->save()){

            $jumuiya_Id = Jumuiya::find($id); 
 
            return redirect('Family')->with('repeat', $jumuiya_Id->id)->with('name', $jumuiya_Id->name)

                ->with('success','Family added successfully');
        }


        else{
            return redirect('Family')

                ->with('success','sorry try again');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function show(Familia $familia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit( $familia)
    {
        $familia= Familia::with('jumuiya')->find($familia);
        $community = Jumuiya::all();

        return view('edit.family',compact('familia','community'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $familia)
    {
        $familia = Familia::find( $familia);

        $familia->name = request('name');
        $familia->jumuiya_id = request('jumuiya_id');

        if($familia->save()){

            return redirect('Family')

                ->with('success','Family updated successfully');
        }

        else{

            return redirect('Family')

                ->with('success','Family fails to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy($familia)
    {
        $family = Familia::find($familia);

        $family->delete();

        return redirect('Family')->with('success','Family has been  deleted');
    }
}
