<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $table="branchs";
    protected $fillable = array('name','address','phone','client_id');
    protected $hidden= ['updated_at'];
    
    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }


    
}
