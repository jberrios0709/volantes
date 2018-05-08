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
        button.btn{
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            cursor:pointer;
            transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
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
        Como estas  {{$order->branch->client->name_contact}}! <br/>
        Nos enteramos que tenés el trabajo con vos. Muchas gracias por confiar en 100%Folletos.<br/>
        Me gustaría saber cómo fue tu experiencia con nosotros, así sabemos si estamos haciendo bien las cosas o hay algo en lo que podemos mejorar.<br/>
        <br/>
        Por favor completa este corto formulario de 5 preguntas<br/>
        <div style="width:100%; height:40px;padding-top:10px;">
            <a target="_blanck" href="https://docs.google.com/forms/d/e/1FAIpQLSfpVnXhu_8-JwALU7J6Wyv3JcX6h3svshFxVqOqMT8Pbi-lkQ/viewform?usp=sf_link">
                <button class="btn">Ir al formulario</button>
            </a>
        </div>
        <br/>
        Muchas gracias por tu tiempo y espero sigamos trabajando juntos y llenar de volantes tu zona.<br/>
        <br/>
        Saludos, Alan Romero<br/>
        <b class="not">No respondas este mail.</b> <br/>
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