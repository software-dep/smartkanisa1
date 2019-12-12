<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Support\Facades\DB;
use App\Jumuiya;

class MemberReportController extends Controller

{
    public function search_members(Request $request){

        $id = $request->get('id');
     $members = DB::table('familias')->join('members', function ($join) {
                    $join->on('members.familia_id', '=', 'familias.id');

        }) ->where('familias.jumuiya_id', '=', $id )
        ->get();
      
        return response([
            "message"=>"succefully getting data",
            "status"=>"200",
            "data"=>$members
        ]);


    }

    public function get_jumuiya(Request $request){
        $jumuiya_id = $request->get('id');

        $data =Jumuiya::find($jumuiya_id);

           return response([
            "message"=>"succefully getting data",
            "data"=>$data
        ]);
    }


    public function search_family_members(Request $request)
    {

        $id = $request->get('id');
        $members = DB::table('familias')->join('members', function ($join) {
            $join->on('members.familia_id', '=', 'familias.id');
        })->where('members.familia_id', '=', $id)
            ->get();

        return response([
            "message" => "successfully getting data",
            "status" => "200",
            "data" => $members
        ]);
    }
}

