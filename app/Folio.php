<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folio extends Model
{
    //

    protected $table="folios";
    protected $fillable = array();
    protected $hidden= ['created_at','updated_at'];

    public function orders_folio(){
        return $this->hasMany('App\OrderFolio');
    }
    
    public function spacesAvailable(){
        $available = 23;
        foreach($this->orders_folio as $spaces){
            $available -= $spaces->spaces;
        }
        return $available;
    }
}
