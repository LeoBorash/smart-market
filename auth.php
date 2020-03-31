<?php session_start() ?>
<?php include("includes/db.php") ?>
<?php include "functions/functions.php"; ?>
<?php
//ФОРМА авторизации
    auth();
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
        <h5 class="text-center">Форма авторизаций</h5>
        <form action="" method="POST" class="w-75 m-auto">
            <input type="text" name="client_email" placeholder="Email" class="form-control mb-1">
            <input type="password" name="client_pass" placeholder="Пароль" class="form-control mb-1">
            <input type="submit" name="btn-log" value="Вход" class="btn btn-success w-100">
        </form>
    </div>
</div>
<?php include "includes/scripts.php"; ?>
</body>


</html>