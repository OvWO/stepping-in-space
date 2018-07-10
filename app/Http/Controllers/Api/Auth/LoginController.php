<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    // public function login(){
    //     if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
    //         $user = Auth::user();
    //         $success['token'] =  $user->createToken('MyApp')->accessToken;
    //         return response()->json(['success' => $success], $this->successStatus);
    //     }
    //     else{
    //         return response()->json(['error'=>'Unauthorised'], 401);
    //     }
    // }

}
