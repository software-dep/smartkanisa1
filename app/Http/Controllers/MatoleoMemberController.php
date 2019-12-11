<?php

namespace App\Http\Controllers;

use App\Matoleo_member;
use Illuminate\Http\Request;
use App\Member;
use App\Matoleo;
use App\Kigango;
use App\General;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MatoleoMemberController extends Controller
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
    public function search()
    {
        $q = Input::get('member');
        $members = Member::where('number', 'LIKE', '%' . $q . '%')->get();
    
        $misa_id = Input::get('misa_id');
        $matoleo = General::with('matoleo')->orderBy('id', 'desc')->where('misa_id',$misa_id)->Paginate(7);
        $vigango = Kigango::all();

       

        if (count($members) > 0) {
            return view('pages.main_matoleo', compact('misa_id','members','matoleo','vigango'));
        } else {
            return redirect()->back()

                ->with('success', 'No Name with that Number, Try to search again!');

        }

    }



    public function store(Request $request)
    {    
        
        $misa_id = Input::get('misa_id');
        $vigango = Kigango::all();
        $matoleo =General::with('matoleo')->orderBy('id', 'desc')->where('misa_id',$misa_id)->Paginate(7);

        $member = request('member_id');
        $memb = Member::find($member);
        $donation = request('misa_id');
        $sadaka = request('sadaka');
        $shukrani = request('shukrani');

         $memb->matoleo()->sync([$donation => ['sadaka' => $sadaka,'shukrani' =>$shukrani]]);
        //  return Redirect::back()->with('success', 'successfully Added',$matoleo);
        return view('pages.main_matoleo', compact('misa_id','members', 'matoleo', 'vigango') );
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matoleo_member  $matoleo_member
     * @return \Illuminate\Http\Response
     */
    public function show(Matoleo_member $matoleo_member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matoleo_member  $matoleo_member
     * @return \Illuminate\Http\Response
     */
    public function edit(Matoleo_member $matoleo_member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matoleo_member  $matoleo_member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matoleo_member $matoleo_member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matoleo_member  $matoleo_member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matoleo_member $matoleo_member)
    {
        //
    }
}
