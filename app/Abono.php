<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    //
    protected $table="abonos";
    protected $fillable = array("mount","method_payment");
    protected $hidden= ['updated_at'];
}
