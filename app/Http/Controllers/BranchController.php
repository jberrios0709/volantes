<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;
use App\Branch;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    //
    public function index($client){
		$tmp = [];
		foreach(Client::find($client)->branchs as $branch){
			array_push($tmp,$branch->infoComplete());
		};
		return response()->json(['status'=>'Ok.', 'data'=>$tmp], 200);
	}

    public function store($client, Request $request){
        $rules = array(
			'name'=> 'required',
			'address'=>'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}else{
            $client=Client::find($client);
			$branch=New Branch($request->all());
			try {
				$save = $client->branchs()->save($branch);
				return response()->json(["status"=> "ok.", "data"=> $save ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
    }

    public function update($client, $branch, Request $request){
        $rules = array(
			'name'=> 'required',
			'address'=>'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}elseif(!Client::find($client) || Branch::where('client_id', '=', $client)->where('id', '=', $branch)->get()->isEmpty()){
            return response()->json(["status"=> "Not Found" ],404);
        }else{
			try {
                Branch::where('client_id', '=', $client)->where('id', '=', $branch)->update($request->all());
				return response()->json(["status"=> "ok." ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
    }
}
