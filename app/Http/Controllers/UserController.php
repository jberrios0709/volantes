<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        return response()->json(["status"=> "ok.", "data"=> USER::all() ],200); 
    }

    public function update($id, Request $request){        
        $rules = array(
			'name'=> 'required',
            'email'=> 'required',
			'type'=> 'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}else{
			$user = User::find($id);
			try {
				$tmp = $user->update($request->all());
				return response()->json(["status"=> "ok.", "data"=>USER::find($id) ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
    }

    public function store(Request $request){        
        $rules = array(
			'name'=> 'required',
            'email'=> 'required',
			'type'=> 'required',
			'password'=>'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}else{
			$user = New User($request->all());
			$user->password = Hash::make($request->password);
			try {
				$tmp = $user->save();
				return response()->json(["status"=> "ok.", "data"=>$user ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
    }
}
