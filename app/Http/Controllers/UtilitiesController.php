<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Utilities;

class UtilitiesController extends Controller
{
    //

    public function calculatePriceBase(Request $request){
        $priceCalculate = Utilities::calculatePriceFlyer($request->size,$request->time_delivery,$request->quantity, $request->garnet);
        
        if(!$priceCalculate){
            return response()->json(['price'=>"Price special"],200);
        }else{
            return response()->json(['price'=>$priceCalculate],200);
        }
    }
}
