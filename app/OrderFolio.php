<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFolio extends Model
{
    //
    
    protected $table="order_folio";
    protected $fillable = array('spaces','folio_id','order_id');
    protected $hidden= ['created_at','updated_at'];

    public function folio(){
        return $this->belongsTo('App\Folio');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}

