<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    //
    protected $table="status_order";
    protected $fillable = array('status','user_id','order_id');
    protected $hidden= [];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function order(){
        return $this->belongsTo('App\Order');
	}
}
