<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Utilities;
use App\Measure;
use App\Branch;

class Order extends Model
{
    //
    protected $table="orders";
    protected $fillable = array(
                                'product', 
                                'size', 
                                'size_special',
                                'quantity',
                                'space',
                                'time_delivery',
                                'date_delivery',
                                'special_time',
                                'sides',  
                                'garnet', 
                                'design',  
                                'mention', 
                                'specification', 
                                'we_send', 
                                'price_flyer', 
                                'price_flyer_special',
                                'price_design', 
                                'price_send', 
                                'trace',
                                'method_payment_trace',
                                'debit',
                                'method_payment', 
                                'branch_id'
                             );
    protected $hidden= ['updated_at'];
    
    public function branch(){
        return $this->belongsTo('App\Branch');
    }
    
    public function status_order(){
        return $this->hasMany('App\StatusOrder');
    }

    public function status_design(){
        return $this->hasOne('App\StatusDesign');
    }

    public function rulesBussines(){
        $this->rulesSpecial();
        $this->calculatePriceBase();
        $this->searchMeasure();
        $this->calculateSpace($this->convertMeasure());
    }

    private function rulesSpecial(){
        if($this->size_special){
            $this->price_flyer_special=true;
        }
    }

    private function calculateSpace(){
        $this->spaces=Utilities::calculateSpace($this->quantity,$this->size);
    }

    private function calculatePriceBase(){
        if(!$this->size_special && !$this->price_flyer_special){
            $this->price_flyer=Utilities::calculatePriceFlyer($this->size,$this->time_delivery,$this->quantity);
        }else{
            $this->price_flyer_special=true;
        };
    }

    private function convertMeasure(){
        $values = explode('x', $this->size);
        return $values[0] * $values[1];
    }

    private function searchMeasure(){
        if(!$this->size_special){
            $size=Measure::find($this->size);
            $this->size=$size->measure;
        }else{
            $this->size_special=true;
        };
    }

    public static function indexAdmin($branch){
        $tmp = [];
		foreach(Branch::find($branch)->orders as $order){
            $order;
            foreach($order->status_order as $info){
                $info->user;
            };
			array_push($tmp,$order);
        };
        return $tmp;
    }

    public static function indexCustom($option){  
        $tmp = [];
        
		foreach(Branch::all() as $branch){
            foreach($branch->orders as $order){
                $or = $order->status_order;
                if($or[count($or)-1]->status === $option){
                    $order->branch->client;
                    $order->status_design;
                    array_push($tmp,$order);
                }
            }
		};
		return $tmp;
    }    

}
