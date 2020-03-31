<?php
include "includes/db.php";
////////////////////////// ФОРМА авторизации ///////////////////////////////

function auth(){
    global $conn;
    if (isset($_POST['btn-log'])) {
        $email = $conn->real_escape_string(trim($_POST['client_email']));
        $pass = $conn->real_escape_string(trim($_POST['client_pass']));

        $query = $conn->query("SELECT * FROM clients WHERE client_email = '$email'");
        if (mysqli_num_rows($query) == 1) {
            $query = $conn->query("SELECT * FROM clients WHERE client_email = '$email' AND client_pass = '$pass'");
            if (mysqli_num_rows($query) == 1) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $_SESSION['name'] = $row['client_name'];
                    $_SESSION['phone'] = $row['client_phone'];
                    $_SESSION['client_id'] = $row['client_id'];
                    $_SESSION['client_status'] = $row['client_status'];
                }
                echo '<script>document.location="/"</script>';
            } else {
                echo '<script>alert("Не правильный пароль")</script>';
            }
        } else {
            echo '<script>alert("Такой Email не существует")</script>';
        }
    }
}

////////////////////////// ФОРМА регистрации ///////////////////////////////
function reg(){
    global $conn;
    if (isset($_POST['btn-reg'])) {

        $name = $_POST['client_name'];
        $phone = $_POST['client_phone'];
        $email = $_POST['client_email'];
        $pass = $_POST['client_pass'];
        $pass2 = $_POST['client_pass2'];
        $data = date("Y-m-d");

        $query = $conn->query("SELECT * FROM clients");
        $row = mysqli_fetch_assoc($query);
        if ($pass == $pass2) {
            if ($row['client_phone'] != $phone) {
                if ($row['client_email'] != $email) {
                    $query = $conn->query("
                    INSERT INTO  clients(client_name,client_phone,client_email,client_pass,client_reg_date)
                    VALUES('$name','$phone','$email','$pass','$data')");
                    if ($query) {
                        echo '<script>alert("Регистрация прошла успешно")</script>';
                        echo '<script>document.location="auth"</script>';
                    }
                } else {
                    echo '<script>alert("Такой Email в базе существует")</script>';
                }
            } else {
                echo '<script>alert("Такой номер телефона в базе существует")</script>';
            }
        }
        echo '<script>alert("Пароли не совпадают")</script>';
    }
}