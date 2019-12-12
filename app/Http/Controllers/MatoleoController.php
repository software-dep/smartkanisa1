<?php

namespace App\Http\Controllers;

use App\Matoleo;
use App\Kigango;
use App\General;
use App\Other;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class MatoleoController extends Controller
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

        $misa = Matoleo::OrderBy('date', 'desc')->Paginate(5);
        $vigango = Kigango::all();
        return view('pages.matoleo', compact('misa','vigango'));


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
        $matoleo = new Matoleo();

       
        $matoleo->date=request('date');
       
     

        if($matoleo->save()){ 
                return redirect('matoleo')
                    ->with('success', ' successfully! Added ');        
        }
        else{

            return redirect('matoleo')

                ->with('success', 'Failed ,try again!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matoleo  $matoleo
     * @return \Illuminate\Http\Response
     */
    public function show(Matoleo $matoleo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matoleo  $matoleo
     * @return \Illuminate\Http\Response
     */
    public function edit(Matoleo $matoleo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matoleo  $matoleo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matoleo $matoleo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matoleo  $matoleo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matoleo $matoleo)
    {
        //
    }

    public function filter()
    {
      return response([
               'status' => 'success',
               'data'  => 'KH',
               ]);
    }



    // addition
    public function otherpage($id)
    {
      
        $misa_id =$id;
        $vigango = Kigango::all();
        $matoleo =Other::with('matoleo')->where('misa_id',$misa_id)->orderBy('id','desc')->Paginate(7);
        return view('pages.other_matoleo',compact('misa_id','vigango','matoleo'));
    }


    public function mainpage($id)
    {
        $misa_id = $id;
      $vigango = Kigango::all();
      $matoleo =General::with('matoleo')->where('misa_id',$misa_id)->orderBy('id','desc')->Paginate(7);
      //dd($matoleo);
      
        return view('pages.main_matoleo',compact('misa_id','vigango','matoleo'));
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->attributes['matoleo'], 2);
    }
}