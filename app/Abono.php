<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    //
    protected $table="abonos";
    protected $fillable = array("mount");
    protected $hidden= ['created_at','updated_at'];
}
