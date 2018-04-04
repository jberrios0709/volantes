<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Email extends Model
{
    //
    protected $table="emails";
    protected $fillable = array('email');
    protected $hidden= ['created_at','updated_at'];

    public static function newOrder($order){
        Mail::send('mail.newOrder',["order"=>$order],function($msj){
            $msj->from('no-responder@cienporcientofolletos.com.ar', '100% Folletos');
            $msj->to($order->emails[0]->email)->subject('Nos llego tu pedido.');
        });
    }

    public static function design($order){
        Mail::send('mail.design',["order"=>$order],function($msj){
            $msj->from('no-responder@cienporcientofolletos.com.ar', '100% Folletos');
            $msj->to($order->emails[0]->email)->subject('Tu trabajo paso a impresión.');
        });
    }

    public static function print($order){
        $abonos = 0;
        foreach($order->abonos as $abono){
            $abonos += $abono->mount;
        }
        Mail::send('mail.print',["order"=>$order, "abonos"=>$abonos],function($msj){
            $msj->from('no-responder@cienporcientofolletos.com.ar', '100% Folletos');
            $msj->to($order->emails[0]->email)->subject('Tu trabajo está listo!');
        });
    }

    public static function delivery($order){
        Mail::send('mail.delivery',["order"=>$order],function($msj){
            $msj->from('no-responder@cienporcientofolletos.com.ar', '100% Folletos');
            $msj->to($order->emails[0]->email)->subject('Como fue tu experiencia?');
        });
    }

    
}
