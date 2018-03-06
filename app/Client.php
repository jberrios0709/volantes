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
    protected $fillable = array('name', 'name_contact','charge', 'reference', 'observations', 'comments');
    protected $hidden= ['created_at','updated_at'];
    
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
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "name_contact"=>$this->name_contact,
            "charge"=>$this->charge,
            "reference"=>$this->reference,
            "observations"=>$this->observations,
            "comments"=>$this->comments,
            "phones"=>$this->phones,
            "mails"=>$this->emails,
            "branch"=>$this->branchs
            ];
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