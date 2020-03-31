<?php session_start() ?>
<?php include("includes/db.php") ?>

<?php
////////////////////////// ФОРМА регистрации ///////////////////////////////
include "functions/functions.php";
reg();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php include "includes/head.php"; ?>
</head>

<body>
<div>
    <div class="main">
        <?php include "includes/top-menu.php"; ?>
        <div class="banner">
            <img src="img/icons/smart.jpg" height="180px" class="mb-2">
        </div>
        <h5 class="text-center">Форма регистраций</h5>
        <form action="" method="POST" class="w-75 m-auto">
            <input type="text" name="client_name" placeholder="Ф.И.О" class="form-control mb-1">
            <input type="tel" name="client_phone" placeholder="Телефон" class="form-control mb-1">
            <input type="email" name="client_email" placeholder="Почта" class="form-control mb-1">
            <input type="password" name="client_pass" placeholder="Пароль" class="form-control mb-1">
            <input type="password" name="client_pass2" placeholder="Подтвердите пароль" class="form-control mb-1">
            <input type="submit" name="btn-reg" value="Регистрация" class="btn btn-success w-100">
        </form>
    </div>
</div>

<?php include "includes/scripts.php"; ?>

</body>

</html>