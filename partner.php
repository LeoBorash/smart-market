<!doctype html>
<html lang="ru">
<head>
    <?php include "includes/db.php"; ?>
    <?php include "includes/head.php"; ?>
    <style>
        .borderss {
            border-bottom: 2px solid gray;
            margin-bottom: 15px;
            padding: 15px;
        }

    </style>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(60975856, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/60975856" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100 mb-3">
            <a class="navbar-brand m-auto" href="#">Kaz-Hit</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="partner">Все товары </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="?cat=house">Для дома </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?cat=health">Здоровье</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?cat=похудения">Похудения</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?cat=watch">Часы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?cat=auto">Для Авто</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?cat=adult">Для взрослых</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php if (isset($_GET['cat'])) {
            $query = $conn->query("SELECT * FROM partner WHERE part_cat = '$_GET[cat]' ORDER BY part_id DESC");
            while ($row = mysqli_fetch_assoc($query)): ?>
                <div class="col-12 borderss">
                    <span><?= $row['part_title'] ?></span>
                    <img class="rounded" src="img/partner/<?= $row['part_img'] ?>" alt="">
                    <p class="text-center mt-2">Цена:
                        <span style="color: red; font-weight: bold"><?= $row['part_price'] ?>тг</span>
                    </p>
                    <a href="<?= $row['part_url'] ?>">
                        <button class="btn btn-warning w-100">Подробнее</button>
                    </a>
                </div>
            <?php endwhile;
        } else {
            $query = $conn->query("SELECT * FROM partner");
            while ($row = mysqli_fetch_assoc($query)): ?>
                <div class="col-12 borderss">
                    <span><?= $row['part_title'] ?></span>
                    <img class="rounded" src="img/partner/<?= $row['part_img'] ?>" alt="">
                    <p class="text-center mt-2">Цена:
                        <span style="color: red; font-weight: bold"><?= $row['part_price'] ?>тг</span>
                    </p>
                    <a href="<?= $row['part_url'] ?>">
                        <button class="btn btn-warning w-100">Подробнее</button>
                    </a>
                </div>
            <?php endwhile;
        }
        ?>


    </div>
</div>
<?php include "includes/scripts.php"; ?>
</body>
</html>