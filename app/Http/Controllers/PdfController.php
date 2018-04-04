<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use PDF;
use App\Order;
use App\Utilities;

class PdfController extends Controller
{
    //
    public function delivery($id){
        $order = Order::find($id);
        $abonos = 0;
        foreach ($order->abonos as $abono){
            $abonos += $abono->mount;
        }
        $pdf = PDF::loadView('pdfDelivery',["abonos"=>$abonos,"order"=>$order,"branch"=>$order->branch,"client"=>$order->branch->client])->setPaper('a4');
        return $pdf->stream();
    }

    public function inForDate(){
        $orders = Utilities::orderArray(Order::inForDate($_GET['desde'],$_GET['hasta']),"sell");
        $ordersFormat = [];
        foreach($orders as $order){
            $date = substr($order->date_sell,0,10);
            $order->date_sell = $date;
            array_push($ordersFormat,$order);
        }
        $pdf = PDF::loadView('pdfInForDate',["comment"=>$_GET['comment'],"orders"=>$ordersFormat,"desde"=>$_GET['desde'],"hasta"=>$_GET['hasta']])->setPaper('a4','landscape');
        return $pdf->stream();
    }
}
