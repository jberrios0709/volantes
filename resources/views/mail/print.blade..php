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
        Buenas noticias: tu trabajo está listo!</br>
        </br>
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
        Falta pagar: {{$order->price_flyer + $order->price_design + $order->price_send - $order->price_trace - $abonos}} </br>
        </br>
        En caso de venir a buscar el trabajo a nuestra oficina podes acercarte de Lunes a Viernes de 9 a 18hs a Enrique Ochoa 800 (esquina con amancio Alcorta, entre Amancio Alcorta y Alfredo Colmo), Pompeya, CABA.</br>
        Link de Google Maps: https://goo.gl/maps/TjvAibaKu7G2</br>
        </br>
        Si queres que te lo mandemos:</br>
        Opción A (estas en CABA): te lo mandamos en moto ($150) o flete (en caso de ser un pedido grande). Tendrías que responderme este mail con la dirección y horario en que te lo pueda mandar.</br>
        </br>
        Opción B (estas fuera de CABA): te lo mandamos por Correo Argentino usando el sistema de Mercado Libre. Es muy sencillo: con el link que te paso clickeas en comprar, llenas los datos de destino y lo pagas. Ya con esa info yo llevo tu trabajo al Correo Argentino para que te lo manden. El correo suele demorar entre 2 a 5 días. Este es el link:</br>
        https://articulo.mercadolibre.com.ar/MLA-686473433-impresion-urgente-de-volantes-afiches-boletas-electorales-_JM</br>
        </br>
        Opción C (estas fuera de CABA): Te lo mandamos por otro medio, otra empresa de envíos que nos indiques. En caso de que lo tengamos que llevar a la empresa te cobramos $150 si es que la empresa esta en CABA.</br>
        </br>
        Cualquier ayuda que necesites llamanos a:</br>
        3221-2889</br>
        15 2850-7362</br>
        www.cienporcientofolletos</br>
        Dirección: Enrique Ochoa 800, Pompeya, CABA</br>
    </p>
</body>
</html>