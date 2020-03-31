<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Спецпредложение от нашего интернет-магазина</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.min.css" type="text/css">
    <script src="js/fancybox.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/fonts.css" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2353398644972629');
        fbq('track', 'Lead');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=2353398644972629&ev=Lead&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->


    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(60744517, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/60744517" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <style>

        .top-title {
            padding: 5px;
            text-align: center;
        }

        .top-title > h2 {
            font-size: 30px;
            line-height: 1.2em;
            padding-bottom: 10px;
            font-weight: 700;
            color: rgb(10, 161, 80);
        }

        .top-title > div {
            font-size: 20px;
            line-height: 1.2em;
            padding-bottom: 10px;
            font-weight: 600;
        }

        .wrap2 > h1 {
            font-size: 19px;
            line-height: 1.5em;
            font-weight: 700;
            padding-bottom: 5px;
        }

        .wrap2 > p {
            font-size: 16px;
        }

        .products {
            text-align: center;
            margin: 10px;
        }

        .products a, h4 {
            color: #0cab57;
        }

        .products img {
            width: 40px;
            margin-left: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="man">

<div class="section block-1 mt-3">
    <div class="wrap">
        <div class="top-title">
            <h2>Спасибо! Ваш заказ принят!</h2>
            <div>Наш оператор свяжется с вами <br> в течение дня</div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <a href="/" class="btn btn-warning w-50 m-auto">Главная страница</a>

    </div>
</div>

<div class="container">
    <div class="row products">
        <div class="col-md-4">
            <p class="font-weight-bold">Мы в соц сетях:</p>
            <a href="https://www.instagram.com/market.smart.kz/">
                <img src="img/icons/insta-icon.png">
            </a>
            <a href="http://api.whatsapp.com/send?phone=77058733054">
                <img src="img/icons/whatsapp-icon.png">
            </a>

        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>
</html>