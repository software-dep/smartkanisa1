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

class MemberController extends Controller
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




    //FILTER DATA HERE
    public function kigango_search(Request $request)
    {
        $q = $request->get('data');
        $vigango = Kigango::where('name', 'LIKE', '%' . $q . '%')->get();



        if (count($vigango) > 0) {
            return response([
                'status' => 200,
                'data' => $vigango
            ]);
        } else {

            return response([
                'status' => 201,
                'data' => "no data found"
            ]);
        }
    }


    

    public function family_member_search(Request $request)
    { 
        $q = $request->get('name');
        $members = Member::with('family', 'family.jumuiya', 'family.jumuiya.mtaa', 'family.jumuiya.mtaa.kigango')->where('name', 'LIKE', '%' . $q . '%')->get();
         if (count($members) > 0) {
            return response([
                'status' => 200,
                'data' => $members
            ]);
        } 
        else {
            return response([
                'status' => 201,
                'data' => 'no data found'
            ]);
        }
    }

    public function members_search_data(Request $request)
    {

        $q = $request->get('data');
        $members = Member::where('name', 'LIKE', '%' . $q . '%')->get();



        if (count($members) > 0) {
            return response([
                'status' => 200,
                'data' => $members
            ]);
        } else {

            return response([
                'status' => 201,
                'data' => "no data found"
            ]);
        }
    }
}