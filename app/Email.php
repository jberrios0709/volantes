<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    protected $table="emails";
    protected $fillable = array('email');
    protected $hidden= ['created_at','updated_at'];
    
}
