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
                                'description_send',
                                'price_flyer', 
                                'price_flyer_special',
                                'price_design', 
                                'price_send', 
                                'trace',
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

    public function abonos(){
        return $this->hasMany('App\Abono');
    }

    public function status_design(){
        return $this->hasOne('App\StatusDesign');
    }

    public function orders_folio(){
        return $this->hasMany('App\OrderFolio');
	}

    public function rulesBussines(){
        $this->rulesSpecial();
        $this->calculatePriceBase();
        $this->calculateDebit();
        $this->asingMeasure();
        $this->calculateSpace();
    }

    private function rulesSpecial(){
        $size=Measure::find($this->size);
        if($size == null){
            $this->size_special=true;
        }
        if($this->size_special){
            $this->price_flyer_special=true;
        }
    }

    public function rulesPrint(){
        $status = $this->status_order;
        if($status[count($status)-1]->status === 3 && $this->comprobateSpacesMissingPrint() > 0){
            return true;
        }
        return false;
    }

    public function comprobateSpacesMissingPrint(){
        $orderPrint = $this->orders_folio;
        $spacesInMissing = $this->spaces;
        foreach($orderPrint as $print){
            $spacesInMissing -= $print->spaces; 
        }
        return $spacesInMissing;
    }

    public function quantityPrintReady(){
        $spacesReady = 0;
        foreach($this->orders_folio as $print){
            if($print->folio->ready){
                $spacesReady += $print->spaces;
            }
        }
        return $spacesReady;
    }

    public function addDateDelivery(){
        if(!$this->special_time){
            $date = date('Y-m-j');
            $dateDelivery = strtotime('+'.$this->time_delivery.' day' , strtotime( $date ));
            $dateDelivery = date('Y-m-j', $dateDelivery);
            $this->date_delivery = $dateDelivery;
            $this->save();
        }
    }

    public function finishOrDebit(){
        $debit = $this->price_flyer + $this->price_send + $this->price_design - $this->trace;
        foreach($this->abonos as $a){
            $debit -= $a->mount;
        }
        if($debit > 0){
            return "debit";
        }else{
            return "finish";
        }
    }


    private function calculateSpace(){
        $this->spaces=Utilities::calculateSpace($this->quantity,$this->convertMeasure());
    }

    private function calculatePriceBase(){
        if(!$this->size_special && !$this->price_flyer_special){
            $this->price_flyer=Utilities::calculatePriceFlyer($this->size,$this->time_delivery,$this->quantity,$this->garnet);
        }else{
            $this->price_flyer_special=true;
        };
    }

    private function calculateDebit(){
        $this->debit = $this->price_flyer + $this->price_design + $this->price_send - $this->trace; 
    }

    private function convertMeasure(){
        $values = explode('x', $this->size);
        return $values[0] * $values[1];
    }

    private function asingMeasure(){
        $size=Measure::find($this->size);
        if($size != null){
            $this->size = $size->measure;
        }else{
            $this->size_special=true;
        }
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
                    if($option === 5){
                        $order->abonos;
                    }
                    array_push($tmp,$order);
                }
            }
		};
		return $tmp;
    }    

}
