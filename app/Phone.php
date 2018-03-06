<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //
    protected $table="phones";
    protected $fillable = array('number','explanatory');
    protected $hidden= ['created_at','updated_at'];
    
}
