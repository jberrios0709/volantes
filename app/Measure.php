<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    //
    protected $table="measures";
    protected $fillable = array('measure');
    protected $hidden= ['created_at','updated_at'];
    
    public function prices(){
        return $this->hasMany('App\Price');
	}
}
