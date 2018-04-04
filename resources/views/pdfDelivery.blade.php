<!DOCTYPE html>
<html>
    <head>

    <style>
        @page {margin: 0cm; }
        div.header{
            text-align: center;
        }
        label.red{
            color:red;
            font-weight:bold;
        }
        
        div.first{
            width:60%;
            position:relative;
            margin:auto;
        }
        div.col-6{
            position:relative;
            width:50%;
            display:inline-block;
        }
        div.col-12{
            position:relative;
            width:100%;
            display:block;
        }
        div.section{
            width:70%;
            margin:auto;
            position:relative;
            border:1px solid black;
            margin-bottom:15px;
        }

        div.title{
            width:100%;
            position:relative;
            color:white;
            background:black;
            text-align:center;
            margin-bottom:15px;
        }
    </style>
        
    </head>
    <body>
        <div class="container">
            <div style="text-align:center">
                <img src="./header-mail.png" alt="">
            </div>
            <div style="width:100%; text-align:center">
                <h3>Etiqueta de Envio</h3>
            </div>
        </div>
        <div class="first">
            <div class="row">
                <div class="col-6"><b>Deuda</b><label class="red">{{$order->price_design + $order->price_send + $order->price_flyer - $order->trace - $abonos}}</label></div>
                <div class="col-6"><b>Fecha del pedido</b> {{$order->created_at}}</div>
            </div>
            <div class="row">
                <div class="col-6"><b>N° de pedido</b> {{$order->id}}</div>
                <div class="col-6"><b>Fecha de entrega</b> <label class="red">{{$order->date_delivery}}</label></div>
            </div>
        </div>
        <div class="section">
            <div class="title">Datos del cliente y envio</div>
            <div class="row">
                <div class="col-6"><b>Nombre del cliente</b>   {{$client->name}}</div>
                <div class="col-6"><b>Número de cliente</b>   <label class="red">{{$client->id}}</label></div>
            </div>
            <div class="row">
                <div class="col-6"><b>Nombre</b>   {{$client->name_contact}}</div>
                <div class="col-6"><b>Teléfono</b>  {{$client->phones[0]->number}}</div>
            </div>
            <div class="col-12"><b>Direccion</b>   {{$client->address}}</div>
            <div class="col-12"><b>Comentario de envio</b>   <label class="red">{{$order->description_send}}</label></div>
        </div>
        <div class="section">
            <div class="title">Datos del trabajo</div>
            <div class="row">
                <div class="col-6"><b>Producto</b>   {{$order->product}}</div>
                <div class="col-6"><b>Tamaño</b>   {{$order->size}}</div>
            </div>
            <div class="row">
                <div class="col-6"><b>Gramage</b>   {{$order->garnet}}</div>
                <div class="col-6"><b>Cantidad</b>  {{$order->quantity}}</div>
            </div>
            <div class="row">
                <div class="col-6"><b>Lados</b>   {{$order->sides}}</div>
            </div>
        </div>

        <div class="section">
            <div class="title">Resumen del pago</div>
            <div class="row" >
                <div class="col-6">
                    <b>Precio diseño </b> {{$order->price_design}}
                </div>
                <div class="col-6">
                    <b>Seña del trabajo </b> {{$order->trace}}
                </div>
            </div>
            <div class="row" >
                <div class="col-6">
                    <b>Precio envio </b> {{$order->price_send}}
                </div>
                <div class="col-6">
                    <b>Método de pago </b> {{$order->method_payment}}
                </div>
            </div>
            <div class="row" >
                <div class="col-6">
                    <b>Precio producto </b> {{$order->price_flyer}}
                </div>
                <div class="col-6">
                    <b>Total </b> {{$order->price_design + $order->price_send + $order->price_flyer}}
                </div>
            </div>        
            <div class="row" >
                <div class="col-6">
                    <b>Abonos</b> {{$abonos}}
                </div>
                <div class="col-6">
                    <b>Deuda</b> {{$order->price_design + $order->price_send + $order->price_flyer - $order->trace - $abonos}}
                </div>
            </div>
            </div>
        </div>

        <div style="width:70%;margin:auto">
            <b>Vendedor</b> {{$order->status_order[0]->user->name}}
        </div>
    </body>
</html>
