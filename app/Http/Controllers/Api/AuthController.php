<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request){
        $user = $request->user;
        $pass = $request->password;
        $login = Auth::attempt(['email'=>$user,'password'=>$pass]);
        if($login){
            $user = Auth::user();
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = ['user'=>$user, 'token'=>$token];
            return response($response, 201);
        }else{
            $response = ['mensaje'=>'Invalid data'];
            return response($response, 401);
        }
    }

    function logout(){
        Auth::user()->token()->logout;
        $response = ['mensaje'=>'Logged out'];
        return response($response, 200);
    }
}
