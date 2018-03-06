<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;
use App\Phone;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class PhoneController extends Controller
{
    //
    public function store($client, Request $request){
        
        $rules = array(
			'number'=> 'required',
			'explanatory'=> 'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}else{
            $client=Client::find($client);
            $phone=New Phone($request->all());
			try {
				$save = $client->phones()->save($phone);
				return response()->json(["status"=> "ok.", "data"=> $save ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
    }

    public function update($client, $phone, Request $request){
        $rules = array(
			'number'=> 'required',
			'explanatory'=> 'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}elseif(!Client::find($client) || Phone::where('client_id', '=', $client)->where('id', '=', $phone)->get()->isEmpty()){
            return response()->json(["status"=> "Not Found" ],404);
        }else{
			try {
                Phone::where('client_id', '=', $client)->where('id', '=', $phone)->update($request->all());
				return response()->json(["status"=> "ok." ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
    }

    public function destroy($client, $phone){
        if(!Client::find($client) || Phone::where('client_id', '=', $client)->where('id', '=', $phone)->get()->isEmpty()){
             return response()->json(["status"=> "Not Found" ],404);
         }else{
             try {
                 Phone::where('client_id', '=', $client)->where('id', '=', $phone)->delete();
                 return response()->json(["status"=> "ok." ],200);
             } catch (Exception $e) {
                 return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
             }
         }
     }


}
