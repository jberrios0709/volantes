<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $table="prices";
    protected $fillable = array('garnet','time','price1','price2','price3','price4');
    protected $hidden= ['updated_at'];
    
    
}
