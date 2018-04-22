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
    </style>
</head>
<body>
    <div class="banner">
        <img src="http://cienporcientofolletos.com.ar/assets/logo.png" alt="">
    </div>
    <div class="content">
        <p>
        Buenas {{$order->branch->client->name_contact}}!<br/><br/>
        Quería informarte que tu trabajo paso al área de Impresión<br/>
        Cuando esté listo el trabajo te vamos a avisar por este medio.<br/>
        </p>
        <br/>
        No respondas este mail. <br/>
        Cualquier ayuda que necesites llamanos a: <br/>
        3221-2889 <br/>
        15 2850-7362 <br/>
        www.cienporcientofolletos.com.ar/ <br/>
        Dirección: Enrique Ochoa 800, Pompeya, CABA <br/>
        <div>
            <img src="http://cienporcientofolletos.com.ar/assets/footer.png" alt="">
        </div>
    </div>
    <div class="footer"></div>
   
</body>
</html>