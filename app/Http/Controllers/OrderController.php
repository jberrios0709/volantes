<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;
use App\Branch;
use App\StatusOrder;
use App\StatusDesign;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrderController extends Controller
{
    //
    public function store($branch, Request $request){  
        $rules = array(
			'product' => 'required',
			'size' => 'required', 
            'quantity' => 'required',
            'time_delivery' => 'required',  
            'garnet' => 'required', 
            'design' => 'required',  
            'mention' => 'required', 
            'price_flyer' => 'required',
            'sides'=> 'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors(), 'request'=>$request], 422);
		}elseif(!Branch::find($branch) ){
            return response()->json(["status"=> "Not Found" ],404);
        }else{
            $user = JWTAuth::parseToken()->authenticate();
            $branch = Branch::find($branch);
            $order = New Order($request->all());
            $order->rulesBussines();
			try {
                $save = $branch->orders()->save($order);
                $sell = New StatusOrder();
                $sell->status = 1;
                $sell->order_id = $save->id;
                $sell->user_id = $user->id;
                $sell->save();
                $design = New StatusOrder();
                $design->status = 2;
                $design->order_id = $save->id;
                $design->user_id = $user->id;
                $design->save();
                $initDesign = New StatusDesign();
                $initDesign->order_id = $save->id;
                $initDesign->save();
				return response()->json(["status"=> "ok.", "data"=> $save ],200);
			} catch (Exception $e) {
				return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
			}
		}
    }
    
    public function index($branch){ 
        return response()->json(['status'=>'Ok.', 'data'=>Order::indexAdmin($branch)], 200);
    }

    public function indexTwo(Request $request){ 
        switch ($_GET['q']){
            case 1:
                return response()->json(['status'=>'Ok.', 'data'=>Order::all()], 200);
            case 2:
                return response()->json(['status'=>'Ok.', 'data'=>Order::indexCustom(2)], 200);
            case 3:
                return response()->json(['status'=>'Ok.', 'data'=>Order::indexCustom(3)], 200);
            default:
		        return response()->json(['status'=>'Ok.', 'data'=>"error"], 422);
        }
    }

    public function design($order,Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        if($user->type === 1 || $user->type === 2){
            $ord = Order::find($order);
            $status =  $ord->status_order;
            if($status[count($status)-1]->status === 2){
                $ord->status_design()->update($request->all());
                if($request->responsibility && $request->finish){
                    $print = New StatusOrder();
                    $print->status = 3;
                    $print->order_id = $ord->id;
                    $print->user_id = $user->id;
                    $print->save();
                    return response()->json(['status'=>'Ok.', 'statusOrder'=>3], 200);
                }else{
                    return response()->json(['status'=>'Ok.', 'data'=>$ord->status_design, 'statusOrder'=>2], 200);
                }
            }else{
                return response()->json(['status'=>'Ok.', 'data'=>"Diseño ya aprobado"], 422);
            }
        }
        return response()->json(['status'=>'Ok.', 'data'=>"No posee los permisos"], 401);
        
        
    }

}
