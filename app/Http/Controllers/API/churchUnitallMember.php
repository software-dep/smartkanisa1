<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kigango;
use App\Jumuiya;
use App\Mtaa;
use App\Familia;
use App\Member;
use FontLib\Table\Type\name;

class churchUnitallMember extends Controller
{
    public function filter()
    {
        $vigango = Kigango::all();
        return response([
            'status' => 'success',
            'data' => $vigango
        ]);
    }


    public function mtaa()
    {
        $mtaa = Mtaa::all();
        return response([
            'status' => 'success',
            'data' => $mtaa
        ]);
    }

    public function jumuiya()
    {
        $jumuiya = Jumuiya::all();
        return response([
            'status' => 'success',
            'data' => $jumuiya
        ]);
    }


   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $member = Member::with('family','family.jumuiya','family.jumuiya.mtaa', 'family.jumuiya.mtaa.kigango')->orderBy('id','desc')-> Paginate(10);
        return response([
            'message' => 'successfully',
            'status' => 200,
            'data' => $member
        ]);
    }
    public function family_member_search(Request $request)
    {
        $q = $request->get('name');
        $family = Familia::with('family','family.jumuiya','family.jumuiya.mtaa')->where('name', 'LIKE', '%' . $q . '%')->get();
       // $family = Familia::where('name', 'LIKE', '%' . $q . '%')->get();


        if (count($family) > 0) {
            return response([
                'status' => 200,
                'data' => $family
            ]);
        } else {
            return response([
                'status' => 201,
                'data' => 'no data found'
            ]);
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return response([
            'message' => 'successfully',
            'status' => 200,
            'data' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function status(Request $request){
        $id = $request->get('id');
        $sta = Member::find($id);
        $check = $sta->status;
        if($check == 0){
            $sta ->status = 1;
            if($sta->save()){
                  $new = Member::find($id);
                return response([
                    'message' => 'Member has been activated',
                    'status' => 200,
                    'data' => $new
                ]);

            }
           
        
        }

        else{
            $sta->status = 0;
            if($sta->save ()){
                 $new = Member::find($id);
                return response([
                    'message' => 'Member has been diactivated',
                    'status' => 200,
                    'data' => $new
                ]);

            }
     
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      

    
    }

    public function update_member(Request $request){
        $id = $request->get('id');

        $member = Member::find($id);
        $member->name=$request->get('name');
        $member->baba=$request->get('baba');
        $member->mama=$request->get('mama');
        $member->gender=$request->get('gender');
        $member->mahali=$request->get('mahali');
        $member->tarehe_kuzaliwa=$request->get('tarehe_kuzaliwa');
        $member->mji =$request->get('mji');
        $member->tarehe_kubatizwa =$request->get('tarehe_kubatizwa');
        $member->no_ubatizo =$request->get('no_ubatizo');
        $member->msimamizi_ubatizo =$request->get('msimamizi_ubatizo');
        $member->parokia_ubatizo =$request->get('parokia_ubatizo');
        $member->komunyo_ya_kwanza =$request->get('komunyo_ya_kwanza');
        $member->komunyo_parish =$request->get('komunyo_parish');
        $member->kipaimara =$request->get('kipaimara');
        $member->no_kipaimara =$request->get('no_kipaimara');
        $member->parokia_kipaimara =$request->get('parokia_kipaimara');
        $member->partiner =$request->get('partiner');
        $member->parokia_ndoa =$request->get('parokia_ndoa');
        $member->tarehe_ndoa =$request->get('tarehe_ndoa');
        $member->no_ndoa=$request->get('no_ndoa');

        if($member->save()){
            return response([
                'message' => 'Member has been updated',
                'status' => 200

            ]);
        }
        else{
            return response([
                'message' => 'fails',
                'status' => 500

            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $member = Member::find($id);

            if ($member->delete()) {
                return response([
                    'status' => 200,
                    'message' => "successfully deleted!"
                ]);
            } else {
                return response([
                    'status' => 500,
                    'message' => "fails to delete"
                ]);
            }
    }
    }


    public function byfamily(Request $request){

                $q = $request->get('name');

                $family = Familia::where('name', 'LIKE', '%' . $q . '%')->get();
               //$family=Member::where('member.family.name', 'LIKE', '%' . $q . '%')->get();
                 if (count($family) > 0) {
                     return response([
                          'status' => 200,
                          'data' =>$family
                                ]);
                          } else {

                              return response([
                                    'status' => 201,
                                    'message' => "There is no data "
                                  ]);

          
        }
    }
}
