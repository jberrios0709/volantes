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


class PrintController extends Controller
{
    //
    public function store(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        if($user->type === 1){
            $rules = array(
                'order_id'=> 'exists:orders,id'
            );
            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$validate->errors()], 422);
            }else{
                $order = Order::find($request->order_id);
                if($order->rulesPrint()){
                    $spacesInMissing = $order->comprobateSpacesMissingPrint();     
                    try{
                        do{
                            if(count(Folio::all())==0){
                                $newFolio= New folio();
                                $newFolio->save();
                            }
                            $folio = Folio::all()->last();
                            $spacesAvailable = $folio->spacesAvailable();
                            if($spacesAvailable == 0 || $folio->ready){
                                $newFolio= New folio();
                                $newFolio->save();
                            }else{
                                $OrderFolio = New OrderFolio();
                                $OrderFolio->folio_id = $folio->id;
                                $OrderFolio->order_id = $order->id;
                                if($spacesAvailable > $spacesInMissing){
                                    $OrderFolio->spaces = $spacesInMissing;
                                    $spacesInMissing = 0;
                                }else{
                                    $OrderFolio->spaces = $spacesAvailable;
                                    $spacesInMissing -= $spacesAvailable;
                                }
                                $OrderFolio->save();
                            }
                        }while($spacesInMissing > 0);
                        $taller = New StatusOrder();
                        $taller->status = 4;
                        $taller->order_id = $order->id;
                        $taller->user_id = $user->id;
                        $taller->save();
                        return response()->json(["status"=> "ok."],200);
                    }catch(Exception $e){
                        return response()->json(['status'=>'Unprocessable Entity', 'errors'=>$e->errorInfo], 400);
                    }
                }else{
                    return response()->json(["status"=> "error", "error"=> "Rules print" ],422);
                }
            }
        }
        return response()->json(['status'=>'Ok.', 'data'=>"No posee los permisos"], 401);
    }

    public function update($id){
        $user = JWTAuth::parseToken()->authenticate();
        if($user->type === 1){
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
        if($user->type === 1){
            $folios = Folio::where("ready","=",0)->get();
            foreach($folios as $folio){
                foreach($folio->orders_folio as $f){
                    $f->order;
                }
            }
            return response()->json(["status"=> "ok.", "data"=>$folios],200);
        }else{
            return response()->json(['status'=>'Ok.', 'data'=>"No posee los permisos"], 401);
        }
    }
}
