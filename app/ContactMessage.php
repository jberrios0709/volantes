<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Order;

//Clase para el envio de correos electronicos
class ContactMessage extends Model
{
    //

    public static function newOrder($orderId){
        $order = Order::find($orderId);
        if(count($order->branch->client->emails)>0){
            try{
                Mail::send('mail.newOrder',["order"=>$order],function($msj) use ($order){
                    $msj->from('no-responder@cienporcientofolletos.com.ar', 'No responder - 100% Folletos');
                    $msj->to($order->branch->client->emails[0]->email)->subject('Nos llego tu pedido.');
                });
                return true;
            }catch(Exception $e){
                return false;
            }
        }
    }

    public static function design($orderId){
        $order = Order::find($orderId);
        if(count($order->branch->client->emails)>0){
            try{
                Mail::send('mail.design',["order"=>$order],function($msj) use ($order){
                    $msj->from('no-responder@cienporcientofolletos.com.ar', 'No responder - 100% Folletos');
                    $msj->to($order->branch->client->emails[0]->email)->subject('Tu trabajo paso a impresión.');
                });
                return true;
            }catch(Exception $e){
                return false;
            }
        }
    }

    public static function printer($orderId){
        $order = Order::find($orderId);
        if(count($order->branch->client->emails)>0){
            $abonos = 0;
            foreach($order->abonos as $abono){
                $abonos += $abono->mount;
            }
            try{
                Mail::send('mail.ready',["order"=>$order, "abonos"=>$abonos],function($msj) use ($order){
                    $msj->from('no-responder@cienporcientofolletos.com.ar', 'No responder - 100% Folletos');
                    $msj->to($order->branch->client->emails[0]->email)->subject('Tu trabajo está listo!');
                });
                return true;
            }catch(Exception $e){
                return false;
            }
        }        
        
    }

    public static function delivery($orderId){
        $order = Order::find($orderId);
        if(count($order->branch->client->emails)>0){
            try{
                Mail::send('mail.delivery',["order"=>$order],function($msj) use ($order){
                    $msj->from('no-responder@cienporcientofolletos.com.ar', 'No responder - 100% Folletos');
                    $msj->to($order->branch->client->emails[0]->email)->subject('Como fue tu experiencia?');
                });
                return true;
            }catch(Exception $e){
                return false;
            }
        }
    }

}
