<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Price; 
use App\Measure; 

class Utilities extends Model
{
    //
    public static function orderArray($array,$option){
        if($option == "delivery"){
            usort($array, "self::delivery");
        return $array;
            
        }else if($option == "sell"){
            usort($array, "self::sell");
        return $array;
            
        }
    }

    public static function delivery( $a, $b ) {
        return strtotime($a['date_delivery']) - strtotime($b['date_delivery']);
    }

    public static function sell( $a, $b ) {
        return strtotime($a['date_sell']) - strtotime($b['date_sell']);
    }

    public static function calculateSpace($flyers, $measure){
        return ($flyers/5000)*($measure/150);
    }

    public static function calculatePriceFlyer($measure, $timeDelivered, $quantityFlyers,$garnet){
        $time = $timeDelivered/7;
        $measureP = Measure::find($measure);
        if(($time == 1 || $time == 3) && $measureP != null){ 
            $prices = Price::where('garnet','=',$garnet)->where('measure_id','=',$measure)->where('time','=',$time)->orderBy('id','desc')->first();
            switch ($quantityFlyers) {
                case 5000:
                    return $priceFlyers = $prices->price1;
                case 10000:
                    return $priceFlyers = $prices->price2;
                case 15000:
                    return $priceFlyers = $prices->price3;
                case 20000:
                    return $priceFlyers = $prices->price4;
            }
        }
        return false;
    }

    public static function test($size){
        return Measure::find($size);
    }
}
