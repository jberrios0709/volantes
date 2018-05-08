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
            Quería informarte que nos llego tu pedido: <br/><br/>

            Trabajo: {{$order->product}} <br/>
            Gramaje: {{$order->garnet}} <br/>
            Tamaño: {{$order->size}} <br/>
            Cantidad: {{$order->quantity}} <br/>
            @if($order->special_time)
                Fecha de entrega: {{$order->date_delivery}} <br/>
            @else
                Tiempo de entrega: {{$order->time_delivery / 7}} semana(s) después de tener el ok del diseño <br/>
            @endif
            
            <br/><br/>
            Precio total: ${{$order->price_flyer + $order->price_design + $order->price_send}} <br/>
            Diseño: ${{$order->price_design}} <br/>
            Envio: ${{$order->price_send}} <br/>
            Impresión: ${{$order->price_flyer}} <br/>
            Pagaste: ${{$order->trace}} <br/>
            Falta pagar: ${{($order->price_flyer + $order->price_design + $order->price_send) - $order->trace}} <br/>
            <br/>
            En caso de que tengamos que hacer el diseño nosotros, el encargado de diseños, Antón, te contactará para mostrarte el diseño hecho, y así definir lo que se vaya a imprimir. Una vez tengamos tu aprobación, el trabajo pasará a impresión. <br/>
            En caso de que hayas mandado el diseño por tu cuenta, lo revisaremos y si hay que corregir algo nos comunicaremos contigo. Si está en condiciones te mandaremos un mail para avisarte cuando pasemos tu trabajo a impresión. <br/>
            <br/>
            Asegurate de haber leido la letra chica en nuestro sitio web para evitar inconvenientes: <br/>
            http://www.cienporcientofolletos.com.ar/letra-chica.html <br/>
            <br/>
            <b class="not">No respondas este mail.</b> <br/>
            Cualquier ayuda que necesites contáctanos a: <br/>
            3221-2889 <br/>
            15 2850-7362 <br/>
            cienporcientofolletos@gmail.com <br/>
            www.cienporcientofolletos.com.ar/ <br/>
            Dirección: Enrique Ochoa 800, Pompeya, CABA 
        </p>
        <div>
            <img src="http://cienporcientofolletos.com.ar/assets/footer.png" alt="">
        </div>
    </div>
    <div class="footer"></div>
    
</body>
</html>