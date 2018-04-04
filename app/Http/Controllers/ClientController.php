<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class ClientController extends Controller
{
    //
    public function index(){
		$tmp = [];
		foreach(Client::all() as $client){
			array_push($tmp,$client->infoComplete());
		};
		return response()->json(['status'=>'Ok.', 'data'=>$tmp], 200);
	}
	
	public function show($id){
		$client=Client::find($id);
		return response()->json(['status'=>'Ok.', 'data'=>$client->infoComplete()], 200);
    }
    
    public function store(Request $request){        
        $rules = array(
			'name'=> 'required',
			'name_contact'=> 'required',
			'charge'=> 'required',
			'address'=> 'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}else{
			$user = JWTAuth::parseToken()->authenticate();
			$client = New Client($request->all());
			try {
				$clientSave = $user->clients()->save($client);
				$clientSave->saveEmails($request->emails);
				$clientSave->savePhones($request->phones, $request->explanatorys);
				return response()->json(["status"=> "ok.", "data"=>$clientSave->infoComplete() ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
	}
	
	public function update($id, Request $request){        
        $rules = array(
			'name'=> 'required',
			'name_contact'=> 'required',
			'charge'=> 'required',
			'address'=> 'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}else{
			$client = Client::find($id);
			try {
				$tmp = $client->update($request->all());
				return response()->json(["status"=> "ok.", "data"=>$tmp ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
    }
	
}
