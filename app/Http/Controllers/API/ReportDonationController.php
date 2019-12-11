<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donation;

class ReportDonationController extends Controller
{
    // select donation option
    public function donations(Request $request){

        $don = $request->get('donation');
        $donations = Donation::where('donation_type',$don)->get();

        $check_repeat = Donation::where('donation_type', $don)->get();

        if (count($check_repeat) > 0) {
            return response([
                'status' => 200,
                'data' => $donations
            ]);
           

        } else {

            return response([
                'status' => 201,
                'message' => $don." has no data at this time"
            ]);
        }
    }


    public function DonationList(Request $request){


                $donation_id = $request->get('id');
                 $donation = $request->get('donation');
                    if($donation=='Member'){
                   $michango = Donation::with('members','members.family','members.family.jumuiya', 'members.family.jumuiya.mtaa', 'members.family.jumuiya.mtaa.kigango')->find($donation_id);
                                      if(count($michango->members)>0){
                                           return response([
                                                  'status' => 200,
                                                  'data' => $michango

                                                         ]);
                                                } else{
                                                    return response([
                                                        'status'=>201,
                                                        'message'=>"There is no data at this time"
                                                    ]);
                                                }

                             }
                         else if($donation=='Family') {
                               $michango = Donation::with('families','families.jumuiya', 'families.jumuiya.mtaa', 'families.jumuiya.mtaa.kigango')->find($donation_id);
          
                                  if(count($michango->families)>0){
                                           return response([
                                                  'status' => 200,
                                                  'data' => $michango

                                                         ]);
                                                } else{
                                                    return response([
                                                        'status'=>201,
                                                       'message'=>"There is no data at this time"
                                                    ]);
                                                }

                                  }
                                 
                         else if($donation=='Jumuiya') {
                                 $michango = Donation::with('jumuiya','jumuiya.mtaa','jumuiya.mtaa.kigango')->find($donation_id);
                                           if(count($michango->jumuiya)>0){
                                           return response([
                                                  'status' => 200,
                                                  'data' => $michango

                                                         ]);
                                                } else{
                                                    return response([
                                                        'status'=>201,
                                                        'message'=>"There is no data at this time"
                                                    ]);
                                                }
                         } 
                         else if ($donation =='Mtaa') {
                                $michango = Donation::with('mtaa')->find($donation_id);
                                    if(count($michango->mtaa)>0){
                                           return response([
                                                  'status' => 200,
                                                  'data' => $michango

                                                         ]);
                                                } else{
                                                    return response([
                                                        'status'=>201,
                                                        'message'=>"There is no data at this time"
                                                    ]);
                                                }
                         } 
                        
                         else {
                                   $michango = Donation::with('kigango')->find($donation_id);
                                              if(count($michango->kigango)>0){
                                           return response([
                                                  'status' => 200,
                                                  'data' => $michango

                                                         ]);
                                                } else{
                                                    return response([
                                                        'status'=>201,
                                                        'message'=>"There is no data at this time"
                                                    ]);
                                                }
                           }
                             

       
    }
}
