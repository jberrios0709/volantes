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
    
    //Metodo para colocar un limite a la cantidad de espacios en el folio
    public function spacesAvailable(){
        $available = 23; //Cantidad maxima 
        foreach($this->orders_folio as $spaces){
            $available -= $spaces->spaces;
        }
        //return $available;
    }
}
