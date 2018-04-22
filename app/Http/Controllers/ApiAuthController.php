<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

class ApiAuthController extends Controller
{
    //
    public function userAuth(Request $request){
        $credentials=$request->only('email','password');
        $token=null;

        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(["error"=>"invalid credentials"],401);
            }
        }catch(JWTException $ex){
            return response()->json(["error"=>"something weng wrong"],500);
        }
        $user = User::where('email','=',$request->email)->get()->first();
        if($user->actived){
            $dataUser = ["name"=>$user->name, "type"=>$user->type];
            return response()->json(["token"=>$token, "user"=>$dataUser],200);
        }else{
            return response()->json(["error"=>"invalid credentials"],401);
        }
        
    }

    public function userRefreshAuth(Request $request){
        $old_token = JWTAuth::getToken();
        $token = JWTAuth::refresh($old_token);
        return response()->json(["token"=>$token],200);
    }


}
