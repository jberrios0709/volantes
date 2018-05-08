<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;
use App\Folio;
use App\OrderFolio;
use App\StatusOrder;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\ContactMessage;



class PrintController extends Controller
{
    //
    public function store(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        if($user->type == "1"){
            $rules = true;
            $total = 0;
            foreach($request->orders as $order){
                $ord = Order::find($order["order_id"]);
                $total += $order["spaces"];
                if(!$ord->rulesPrint($order["spaces"]) || $order["spaces"] <= 0){
                    $rules = false;
                }
            }
            if($rules && $total > 0){
                try{
                    $folio= New folio();
                    $folio->save();
                    foreach($request->orders as $order){
                        $OrderFolio = New OrderFolio();
                        $OrderFolio->folio_id = $folio->id;
                        $OrderFolio->order_id = $order["order_id"];
                        $OrderFolio->spaces = $order["spaces"];
                        $OrderFolio->save();
                        foreach($request->orders as $order){
                            $ord = Order::find($order["order_id"]);
                            if($ord->comprobateSpacesMissingPrint() == 0){
                                $taller = New StatusOrder();
                                $taller->status = 4;
                                $taller->order_id = $ord->id;
                                $taller->user_id = $user->id;
                                $taller->save();
                            }
                        }
                        
                    }
                }catch(Exception $e){
                    return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
                }
                return response()->json(["status"=> "ok."],200);
            }else{
                return response()->json(["status"=> "error", "error"=> "Rules print" ],422);
            }
        }
        return response()->json(['status'=>'Ok.', 'data'=>"No posee los permisos"], 401);
    }

    public function update($id){
        $user = JWTAuth::parseToken()->authenticate();
        if($user->type == "1"){
            $folio = Folio::find($id);
            if(!$folio->ready){
                foreach($folio->orders_folio as $print){
                    $order = $print->order;
                    if(($order->quantityPrintReady()+$print->spaces)==$order->spaces){
                        $delivered = New StatusOrder();
                        $delivered->status = 5;
                        $delivered->order_id = $order->id;
                        $delivered->user_id = $user->id;
                        $delivered->save();
                        ContactMessage::printer($order->id);
                    }
                }
                $folio->ready = true;
                $folio->update();
                return response()->json(["status"=> "ok."],200);
            }else{
                return response()->json(["Error"=> "ok.", "data"=>"Folio ya se encuentra con status ready."],422);
            }
        }
        return response()->json(['status'=>'Ok.', 'data'=>"No posee los permisos"], 401);
    }

    public function index(){
        $user = JWTAuth::parseToken()->authenticate();
        if($user->type == "1"){
            $folios = Folio::where("ready","=",0)->get();
            foreach($folios as $folio){
                foreach($folio->orders_folio as $f){
                    $f->order->branch->client;
                }
            }
            return response()->json(["status"=> "ok.", "data"=>$folios],200);
        }else{
            return response()->json(['status'=>'Ok.', 'data'=>"No posee los permisos"], 401);
        }
    }
}
