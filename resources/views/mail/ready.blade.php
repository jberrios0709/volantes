<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div.banner{
            background-color: transparent; 
            background-image: url(http://cienporcientofolletos.com.ar/assets/top_bg_mail.jpg);
            padding: 0;
            margin:0;
            width: 80%;
            height: 60px;
        }
        div.content{
            padding: 10px;
            margin:0;
            width: 80%;
        }
        div.footer{
            background-color: transparent; 
            background-image: url(http://cienporcientofolletos.com.ar/assets/top_bg_mail.jpg);
            padding: 0;
            margin:0;
            width: 80%;
            height: 30px;
        }
        b.not{
            color:red;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <div class="banner">
        <img src="http://cienporcientofolletos.com.ar/assets/logo.png" alt="">
    </div>
    <div class="content">
    <p>
            Buenas {{$order->branch->client->name_contact}}! <br/>
            Buenas noticias: tu trabajo está listo!<br/>
            <br/>
            Trabajo: {{$order->product}} <br/>
            Gramaje: {{$order->garnet}} <br/>
            Tamaño: {{$order->size}} <br/>
            Cantidad: {{$order->quantity}} <br/>
            @if($order->special_time)
                Fecha de entrega: {{$order->date_delivery}} <br/>
            @else
                Tiempo de entrega: {{$order->time_delivery / 7}} semana(s) después de tener el ok del diseño <br/>
            @endif
            <br/>
            Precio total: ${{$order->price_flyer + $order->price_design + $order->price_send}} <br/>
            Diseño: ${{$order->price_design}} <br/>
            Envio: ${{$order->price_send}} <br/>
            Impresión: ${{$order->price_flyer}} <br/>
            Pagaste: ${{$order->trace + $abonos}} <br/>
            Falta pagar: ${{$order->price_flyer + $order->price_design + $order->price_send - ($order->trace + $abonos)}} <br/>
            <br/>
            En caso de venir a buscar el trabajo a nuestra oficina podes acercarte de Lunes a Viernes de 9 a 18hs a Enrique Ochoa 800 (esquina con amancio Alcorta, entre Amancio Alcorta y Alfredo Colmo), Pompeya, CABA.<br/>
            Link de Google Maps: https://goo.gl/maps/TjvAibaKu7G2<br/>
            <br/>
            <u>Si queres que te lo mandemos:</u><br/>
            <b>Opción A </b>(estas en CABA): te lo mandamos en moto ($150) o flete (en caso de ser un pedido grande). Tendrías que contactarnos para informarnos la dirección y horario en que te lo podemos mandar.<br/>
            <br/>
            <b>Opción B </b>(estas fuera de CABA): te lo mandamos por Correo Argentino usando el sistema de Mercado Libre. Es muy sencillo: con el link que te paso clickeas en comprar, llenas los datos de destino y lo pagas. Ya con esa info yo llevo tu trabajo al Correo Argentino para que te lo manden. El correo suele demorar entre 2 a 5 días. Este es el link:<br/>
            https://articulo.mercadolibre.com.ar/MLA-686473433-impresion-urgente-de-volantes-afiches-boletas-electorales-_JM<br/>
            <br/>
            <b>Opción C </b>(estas fuera de CABA): Te lo mandamos por otro medio, otra empresa de envíos que nos indiques. En caso de que lo tengamos que llevar a la empresa te cobramos $150 si es que la empresa esta en CABA.<br/>
            <br/>
            <b class="not">No respondas este mail.</b> <br/>
            Cualquier ayuda que necesites contáctanos a:<br/>
            3221-2889<br/>
            15 2850-7362<br/>
            cienporcientofolletos@gmail.com <br/>
            www.cienporcientofolletos.com.ar<br/>
            Dirección: Enrique Ochoa 800, Pompeya, CABA<br/>
        </p>
        <div>
            <img src="http://cienporcientofolletos.com.ar/assets/footer.png" alt="">
        </div>
    </div>
    <div class="footer"></div>
    
</body>
</html>