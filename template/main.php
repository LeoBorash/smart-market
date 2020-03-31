<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
        .fffs img{
            width: 400px;
            height: 300px;
        }
    </style>
</head>
<body>
<?php include "../includes/db.php"; ?>
<?php
    $sql = $conn->query("SELECT * FROM products WHERE")
?>
<div id="demo" class="carousel slide " data-ride="carousel" >
    <div class="container">



    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="fffs">
    <div class="carousel-inner ">
        <div class="carousel-item active ">
            <img src="/img/products/woman/4.jpg" >
        </div>
        <div class="carousel-item">
            <img src="/img/products/woman/5.jpg">
        </div>
        <div class="carousel-item">
            <img src="/img/products/woman/6.jpg">
        </div>
    </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
</div>
</body>
</html>
