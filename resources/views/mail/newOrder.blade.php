<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>
        Buenas {{$order->client->name_contact}}! </br>
        Quería informarte que entro tu pedido: </br>

        Trabajo: {{$order->product}} </br>
        Gramaje: {{$order->garnet}} </br>
        Tamaño: {{$order->size}} </br>
        Cantidad: {{$order->quantity}} </br>
        Diseño: Hacer diseño/Hecho por el cliente </br>
        @if($order->special_time)
            Tiempo de entrega: {{$order->time_delivery}} </br>
        @else
            Tiempo de entrega: {{$order->time_delivery / 7}} semanas después de tener el ok del diseño </br>
        @endif
        
        </br>
        Precio total: {{$order->price_flyer + $order->price_design + $order->price_send}} </br>
        Diseño: {{$order->price_send}} </br>
        Impresión: {{$order->price_flyer}} </br>
        Pagaste: {{$order->trace}} </br>
        Falta pagar: {{$order->price_flyer + $order->price_design + $order->price_send - $order->price_trace}} </br>
        </br>
        En caso de que tengamos que hacer el diseño nosotros, el encargado de diseños, Antón, te contactará para mostrarte el diseño hecho, y así definir lo que se vaya a imprimir. Una vez tengamos tu aprobación, el trabajo pasará a impresión. </br>
        En caso de que hayas mandado el diseño por tu cuenta, lo revisaremos y si hay que corregir algo nos comunicaremos contigo. Si está en condiciones te mandaremos un mail para avisarte cuando pasemos tu trabajo a impresión. </br>
        </br>
        Asegurate de haber leido la letra chica en nuestro sitio web para evitar inconvenientes: </br>
        http://www.cienporcientofolletos.com.ar/letra-chica.html </br>
        </br>
        No respondas este mail. </br>
        Cualquier ayuda que necesites llamanos a: </br>
        3221-2889 </br>
        15 2850-7362 </br>
        www.cienporcientofolletos.com.ar/ </br>
        Dirección: Enrique Ochoa 800, Pompeya, CABA 
    </p>
</body>
</html>