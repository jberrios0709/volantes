<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusDesign extends Model
{
    //
    protected $table="status_design";
    protected $fillable = array('design','send1','send2','send3','send4','send5','correction1','correction2','correction3','correction4','correction5','approved','finish','responsibility','order_id');
    protected $hidden= ['created_at','updated_at'];
}
