<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Mtaa;
use App\Jumuiya;
use Validator;

class ChurchUnitController extends Controller
{

   


    public function get_mitaa(Request $request){
    

        $q = $request->get('data');
        $mitaa = Mtaa::where('kigango_id',  $q )->get();

        if (count($mitaa) > 0) {
            return response([
                'status' => 200,
                'data' => $mitaa
            ]);

        } else {

            return response([
                'status' => 404,
                'data' => "no data found"
            ]);

        }
    }



    public function get_jumuiya(Request $request)
    {

        $q = $request->get('data');
        $jumuiya = Jumuiya::where('mtaa_id',$q)->get();

        if (count($jumuiya) > 0) {
            return response([
                'status' => 200,
                'data' => $jumuiya
            ]);

        } else {

            return response([
                'status' => 404,
                'data' => "no data found"
            ]);

        }
    }




// get jumiya data
   public function getJumuiya(){
        $jumuiya = Jumuiya::with('mtaa','mtaa.kigango')->orderBy('id', 'desc')->paginate(10);

        return response([
            'status' => 200,
            'message' => "successfully added",
            'data' => $jumuiya
        ]);
}

  public function search_jumuiya(Request $request){
        $q = $request->get('name');
       

        $jumuiya = Jumuiya::with('mtaa','mtaa.kigango')->where('name', 'LIKE', '%' . $q . '%')->get();


        if (count($jumuiya) > 0) {
            return response([
                'status' => 200,
                'data' =>$jumuiya
            ]);
        } else {

            return response([
                'status' => 201,
                'message' => "There is no any Community with that name "
            ]);

          
        }

    }




// jumuiya
    public function insertData(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'mtaa_id' => 'required'
            
        ]);

        if($validator->fails()){
            return response([
                'status' => 201,
                'message' =>"Bad input ! try again"
            ]);
        }


        $check_repeat = Jumuiya::where('name', $request->get('name'))->where('mtaa_id', $request->get('mtaa_id'))->get();

        if (count($check_repeat) > 0) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);

        } else {

        //    function
            $jumuiya = new Jumuiya();
            $jumuiya->name = $request->get('name');
            $jumuiya->mtaa_id = $request->get('mtaa_id');
          


            if ($jumuiya->save()) {

                return response([
                    'status' => 200,
                    'message' => "successfully added"
                ]);
            } else {
                return response([
                    'status' => 500,
                    'message' => "failed"
                ]);
            }

        }

      
       

      
    }

    public function destroy($jumuiya){
        $jumuiya = Jumuiya::find($jumuiya);
       
        if($jumuiya->delete()){
            return response([
                'status' => 200,
                'message' => "successfully deleted!"
            ]);
        }else{
            return response([
                'status' => 500,
                'message' => "fails to delete"
            ]);
        }
    }

    public function show($jumuiya){
        $jumuiya =Jumuiya::find($jumuiya);

        return response([
             'status'=>200,
             'data' =>$jumuiya 
        ]);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'mtaa_id' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 201,
                'message' => "Bad input! try again"
            ]);
        }

        $check_repeat = Jumuiya::where('name', $request->get('name'))->where('mtaa_id', $request->get('mtaa_id'))->get();

        if (count($check_repeat) > 1) {
            return response([
                'status' => 201,
                'message' => "dont repeat record! try again"
            ]);

        } else {
        $get_id= $request->get('id');

        $jumuiya = Jumuiya::find($get_id);
        $jumuiya->name = $request->get('name');
        $jumuiya->mtaa_id = $request->get('mtaa_id');
       


        if ($jumuiya->save()) {

            return response([
                'status' => 200,
                'message' => "successfully updated"
            ]);
        } else {
            return response([
                'status' => 500,
                'message' => "failed"
            ]);
        }

    }
    }



    public function search_family(Request $request){
        $q = $request->get('name');
       

        $family = Familia::with('jumuiya', 'jumuiya.mtaa','jumuiya.mtaa.kigango')->where('name', 'LIKE', '%' . $q . '%')->get();


        if (count($family) > 0) {
            return response([
                'status' => 200,
                'data' =>$family
            ]);
        } 
        
        else {

            return response([
                
              'status' =>201,
                'error' => "There is no any family with that name "
            ]);

          
        }

    }

}
