<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Branch;
use App\Email;
use App\Phone;

class Client extends Model
{
    //
    protected $table="clients";
    protected $fillable = array('name', 'name_contact','charge', 'address', 'reference', 'observations', 'comments');
    protected $hidden= ['updated_at'];
    
    public function userCreate(){
        return $this->belongsTo('App\User');
    }   

    public function branchs(){
        return $this->hasMany('App\Branch');
    }

    public function phones(){
        return $this->hasMany('App\Phone');
    }

    public function emails(){
        return $this->hasMany('App\Email');
    }

    public function infoComplete(){
        $this->phones;
        $this->emails;
        $this->branchs;
        return $this;
        
    }

    public function saveEmails($emails){
        for($i = 0; $i < count($emails); ++$i) {
            $tmp=New Email();
            $tmp->email=$emails[$i];
            $this->emails()->save($tmp);
        }
    }

    public function savePhones($phones, $explanatorys){
        for($i = 0; $i < count($phones); ++$i) {
            $tmp=New Phone();
            $tmp->number = $phones[$i];
            $tmp->explanatory = $explanatorys[$i];
            $this->phones()->save($tmp);
        }        
    }
}
