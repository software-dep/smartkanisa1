<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    
    public function get_current_user(){
       
        $user = Auth::id();

        dd($user);
       
        // return response([
        //     "data"=>$user
        // ]);

    }
}
