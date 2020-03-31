<?php session_start() ?>
<?php include("includes/db.php") ?>
<?php
if (isset($_POST['title'])) {
    $client = $_SESSION['client_id'];
    $pr = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $url = $_POST['url'];
    $count = 1;

    $query = $conn->query("SELECT * FROM cart WHERE cart_client_id = '$_SESSION[client_id]' and cart_pr_id = '$pr'");
    if (mysqli_num_rows($query) > 0) {
        $query = $conn->query("UPDATE cart SET cart_pr_count = cart_pr_count + 1");
    } else {
        $query = $conn->query("
        INSERT INTO cart(cart_pr_id, cart_client_id, cart_pr_title, cart_pr_price, cart_pr_img, cart_pr_img_url, cart_pr_count) 
        VALUES ('$pr','$client',' $title','$price','$image','$url','$count')
        ");
        if ($query) {
            echo $title;
        } else {
            echo $pr;
        }
    }
}

if(isset($_POST['cart_pr_id'])){
    $query=$conn->query("DELETE FROM `cart` WHERE cart_pr_id = '$_POST[cart_pr_id]'");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php include "includes/head.php"; ?>
    <style>
        li {
            display: block;
        }

        ul {
            border-bottom: 2px solid #f4f4f4;
        }

        .cart_image {
            width: 65px;
        }

        .totals {
            border-top: 2px solid gray;
            margin: 20px 35px 0 35px;
            padding-top: 5px;
        }
    </style>
</head>

<body>
<div class="container">
    <?php include "includes/top-menu.php"; ?>
    <!-- ----------------------ПОКАЗАТЬ ТОВАРЫ КОРЗИНЫ---------------------- -->
    <form action="order" method="post">
    <div class="row mt-3">
        <?php
        $query = $conn->query("SELECT * FROM cart WHERE cart_client_id = '$_SESSION[client_id]'");
        if(mysqli_num_rows($query)>0) {
            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <input type="hidden" name="prod_id" value="<?= $row['cart_pr_id'] ?>">

                <input type="hidden" name="cart_pr_id" id="deletes" value="<?= $row['cart_pr_id'] ?>">
                <li class="col-3 mb-2">
                    <img src="img/products/<?= $row['cart_pr_img_url'] ?><?= $row['cart_pr_img'] ?>"
                         class="cart_image">
                </li>
                <a  name="order_name" class="align-self-center   col-5 mb-2">
                    <?= $row['cart_pr_title'] ?>
                </a>
                <a name="order_price" class="align-self-center justify-content-end  col-2 ">
                    <?= $row['cart_pr_price']?>
                </a>
                <li id="deletepr" class="align-self-center justify-content-end  col-2 " >
                    <i class="far fa-trash-alt"  style="color: #FF523A"></i>
                </li>
                <?php
            } ?>
            <div class="row">
                <?php
                $query = $conn->query("SELECT SUM(cart_pr_price*cart_pr_count) as totalc FROM cart WHERE cart_client_id = '$_SESSION[client_id]'");
                $row = mysqli_fetch_assoc($query);
                ?>
                <div class="col totals">Общая сумма:
                    <span class="float-right pr-3 totali"><?= $row['totalc'] ?>тг</span></div>
                <input type="submit" name="oformim" class="btn btn-success w-75  mb-5 oformit" value="Офирмить заказ"></input>
            </div>
            <?php
        }else{ ?>
            <div class="container text-center" >
                <h3 class="mt-5">Корзина пуста</h3>
                <p class="mb-5">Но это никогда не поздно исправить :)</p>
            </div>
        <?php }
        ?>

    </div>
    </form>
    <?php
    if(isset($_POST['oformim'])){
        echo $_POST['cart_pro_id'];
    }
    ?>

</div>
<footer>
    <div class="container" style="clear: both;margin-top: 50%;">
        <div class="row ">
            <div class="col">
                <p class="text-center">Smart Market <br> Все права защищены <br> 2018 - 2020</p>
            </div>
        </div>
    </div>
</footer>
<div class="test"></div>


<?php include "includes/scripts.php"; ?>
<script>
    $('#deletepr').click(function(){
        alert('Удалено');
        location.reload();
        var str = $('#deletes').serialize();
        $.ajax({
            method: 'post',
            url: "cart",
            data: str,
            success: function(data) {
            }
        });
    });


</script>

</body>

</html>