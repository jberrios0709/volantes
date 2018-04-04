<!DOCTYPE html>
<html>
    <head>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
    <style>
        div.header{
            text-align:center;
        }
        table{
            width:100%;
        }
        td{
            text-align:center;
        }
        td.black{
            background:black;
            color:white;
        }
        div.comment{
            width:100%;
            padding:10px;
            border:1px solid black;
            text-align: justify;
        }
        div.comment > p{
            font-size:16px;
            font-weight:bold;
        }
    </style>
        
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img src="./logo.png" alt="">
            </div>
            <div style="text-align:center">
                <h4>Ingresos en el período {{$desde}}-{{$hasta}}</h4>
            </div>
            <div class="content">
                <section>
                    <table>
                        <tr>
                            <td class="black">Fecha</td>
                            <td class="black">N° cliente</td>
                            <td class="black">Cliente</td>
                            <td class="black">N° Orden</td>
                            <td class="black">Producto</td>
                            <td class="black">Cantidad</td>
                            <td class="black">Monto</td>
                            <td class="black">Tipo</td>
                            <td class="black">Medio de pago</td>
                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->date_sell}}</td>
                            <td>{{$order->branch->client->id}}</td>
                            <td>{{$order->branch->client->name}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->product}}</td>
                            <td>{{$order->quantity}}</td>
                            @if($order->abono)
                            <td>{{$order->abono->mount}}</td>
                            <td>Abono</td>
                            @else
                            <td>{{$order->trace}}</td>
                            <td>Seña</td>
                            @endif
                            <td>{{$order->method_payment}}</td>
                        </tr>
                        @endforeach
                    </table>
                </section>
            </div>

            @if($comment!=null)
                <h4>Nota:</h4>
                <div class="comment">
                    <p>{{$comment}}</p>
                </div>
            @endif
        </div>
    </body>
</html>
