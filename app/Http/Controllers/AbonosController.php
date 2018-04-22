<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Order;
use App\Abono;
use App\StatusOrder;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\ContactMessage;


class AbonosController extends Controller
{
    //
    public function store($id,Request $request){
        $rules = array(
			'mount'=> 'required'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
			return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
		}else{
            $user = JWTAuth::parseToken()->authenticate();
            $order = Order::find($id);
            $status =  $order->status_order;
            if($status[count($status)-1]->status != "8"){
                $abono=New Abono();
                $abono->mount = $request->mount;
                $abono->method_payment = $request->method_payment;
                try {
                    $order->abonos()->save($abono);
                    if($order->finishOrDebit() === "finish" && ($status[count($status)-1]->status == "5" || $status[count($status)-1]->status == "7")){
                        $finish = New StatusOrder();
                        $finish ->status = 6;
                        $finish ->order_id = $order->id;
                        $finish ->user_id = $user->id;
                        $finish ->save();
                        ContactMessage::delivery($order->id);
                        
                    }else if($request->delivery == true && $status[count($status)-1]->status == "5"){
                        $debit = New StatusOrder();
                        $debit->status = 7;
                        $debit->order_id = $order->id;
                        $debit->user_id = $user->id;
                        $debit->save();
                        ContactMessage::delivery($order->id);
                    }
                    
                    return response()->json(["status"=> "ok."],200);
                } catch (Exception $e) {
                    return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
                }
            }
		}
    }
}
