<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class MemberController extends Controller
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
        $family = Familia::all();
        return view('pages.member');
    }




    public function search()
    {
         $q = Input::get('name');
         $family = Familia::where('name', 'LIKE', '%' . $q . '%')->get();
        
    


        if (count($family) > 0) {
            return view('pages.member', compact('family'));
        } else {
            return redirect('get_family')

                ->with('success', 'No Family with that name found, Try to search again!');

        }
        }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::with('family')->orderBy('id','desc')->Paginate(10);
        return view('pages.all_member',compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Member();
        $member->name= request('name');
        $member->baba= request('baba');
        $member->mama= request('mama');
        $member->gender= request('gender');
        $member->mahali= request('mahali');
        $member->familia_id = request('familia_id');
        $member->tarehe_kuzaliwa= request('birthdate');
       

        // generate No
        $latestMember =Member::orderBy('created_at','DESC')->first();
        if($latestMember==null){
           $member->number=101;
        }

        else{
            $member->number = ($latestMember->id + 101);
        }
     
            
             
       if(request('baptized')=='no'){
            //kubatizwa 
            $member->tarehe_kubatizwa = '1900-01-01';
            $member->no_ubatizo = 0;
            $member->parokia_ubatizo = '-';
            $member->padre_ubatizo = '-';
            $member->msimamizi_ubatizo = '-';
            $member->komunyo_ya_kwanza = '-';
            $member->mji = '-';

        // kipaimara
            $member->kipaimara = '-';
            $member->no_kipaimara = 0;
            $member->parokia_kipaimara = '-';


        //ndoa
            $member->tarehe_ndoa = '1900-01-01';
            $member->no_ndoa = 0;
            $member->parokia_ndoa = '-';
           
       }
        else{
             //kubatizwa 
            $member->tarehe_kubatizwa = request('tarehe_kubatizwa');
            $member->no_ubatizo = request('no_ubatizo');
            $member->parokia_ubatizo = request('parokia_ubatizo');
            $member->padre_ubatizo = request('padre_ubatizo');
            $member->msimamizi_ubatizo = request('msimamizi_ubatizo');
            $member->komunyo_ya_kwanza = request('komunyo_ya_kwanza');
            $member->mji = request('mji');


            if (request('communion') == 'no') {

            // kipaimara
                $member->kipaimara = '-';
                $member->komunyo_ya_kwanza = "-";
                $member->no_kipaimara = 0;
                $member->parokia_kipaimara = '-';


             //ndoa
                $member->tarehe_ndoa = '1900-01-01';
                $member->no_ndoa = 0;
                $member->parokia_ndoa = '-';


            }

        
            else{
                // kipaimara
                $member->komunyo_ya_kwanza = request('komunyo_ya_kwanza');
                $member->kipaimara = request('kipaimara');
                $member->no_kipaimara = request('no_kipaimara');
                $member->parokia_kipaimara = request('parokia_kipaimara');


                 //ndoa
                $member->tarehe_ndoa = request('tarehe_ndoa');
                $member->no_ndoa = request('no_ndoa');
                $member->parokia_ndoa = request('parokia_ndoa');
            }

        
        }


        if(  $member->save()){

            return redirect('Member')

                ->with('success','Member added successfully');
        }


        else{
            return redirect('Member')

                ->with('success','sorry try again');

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit( $member)
    {
        $member=Member::find($member);
        $family = Familia::all();
        return view('edit.member',compact('member','family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $member)
    {
        $member = Member::find($member);

        $member->name = request('name');
        $member->baba = request('baba');
        $member->mama = request('mama');
        $member->gender = request('gender');
        $member->mahali = request('mahali');
        $member->tarehe_kuzaliwa = request('birthdate');
        $member->mji = request('mji');

        // generate No
       
            $member->number = request('number');
        





        $member->tarehe_kubatizwa = request('tarehe_kubatizwa');
        $member->no_ubatizo = request('no_ubatizo');
        $member->parokia_ubatizo = request('parokia_ubatizo');
        $member->padre_ubatizo = request('padre_ubatizo');
        $member->msimamizi_ubatizo = request('msimamizi_ubatizo');
        $member->komunyo_ya_kwanza = request('komunyo_ya_kwanza');
        $member->kipaimara = request('kipaimara');
        $member->no_kipaimara = request('no_kipaimara');
        $member->parokia_kipaimara = request('parokia_kipaimara');

        $member->tarehe_ndoa = request('tarehe_ndoa');
        $member->no_ndoa = request('no_ndoa');
        $member->parokia_ndoa = request('parokia_ndoa');
        $member->familia_id = request('familia_id');


        if ($member->save()) {

            return redirect('/Member/create')

                ->with('success', 'Member updated successfully');
        } else {

            return redirect('/Member/create')

                ->with('success', 'Member fails to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($member)
    {
        $member =Member::find($member);
        $member->delete();



        return redirect('/Member/create')->with('success', 'Member has been  deleted');
    }
}