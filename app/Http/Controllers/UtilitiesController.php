<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Utilities;

class UtilitiesController extends Controller
{
    //

    public function calculatePriceBase(Request $request){
        $priceCalculate = Utilities::calculatePriceFlyer($request->product,$request->size,$request->time_delivery,$request->quantity, $request->garnet);
        
        if(!$priceCalculate){
            return response()->json(['price'=>"Price special"],200);
        }else{
            return response()->json(['price'=>$priceCalculate],200);
        }
    }

    public function calculateSpaces(Request $request){
        $values = explode('x', $request->size);
        $size = $values[0] * $values[1];
        $spaceCalculate = Utilities::calculateSpace($request->quantity,$size);
        return response()->json(['space'=>$spaceCalculate],200);
    }

    public function test(Request $request){
        return response()->json(['space'=>Utilities::test($request->size)],200);
    }
}
