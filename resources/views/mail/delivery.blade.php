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
        Como estas  {{$order->branch->client->name_contact}}! <br/>
        Nos enteramos que tenés el trabajo con vos. Muchas gracias por confiar en 100%Folletos.<br/>
        Me gustaría saber cómo fue tu experiencia con nosotros, así sabemos si estamos haciendo bien las cosas o hay algo en lo que podemos mejorar.<br/>
        <br/>
        Por favor completa el formulario del siguiente enlace. https://docs.google.com/forms/d/e/1FAIpQLSfpVnXhu_8-JwALU7J6Wyv3JcX6h3svshFxVqOqMT8Pbi-lkQ/viewform?usp=sf_link <br/>
        <br/>
        Muchas gracias por tu tiempo y espero sigamos trabajando juntos y llenar de volantes tu zona.<br/>
        <br/>
        Saludos, Alan Romero<br/>
        3221-2889<br/>
        15 2850-7362<br/>
        www.cienporcientofolletos<br/>
        Dirección: Enrique Ochoa 800, Pompeya, CABA<br/>
        </p>
        <div>
            <img src="http://cienporcientofolletos.com.ar/assets/footer.png" alt="">
        </div>
    </div>
    <div class="footer"></div>
    
</body>
</html>