<?php session_start() ?>
<?php include("includes/db.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php"; ?>
</head>
<body>

<div class="container">
    <?php include "includes/top-menu.php"; ?>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $sql = $conn->query("SELECT * FROM products WHERE pr_id = '$_GET[id]'");

            while ($row = mysqli_fetch_assoc($sql)) {
                $imgs = explode('|', $row['pr_img']);
                $i = 0;
                foreach ($imgs as $i => $img) {
                    $active = '';
                    if ($i == 0) {
                        $active = 'active';
                    } ?>
                    <div class="carousel-item <?= $active ?>">
                        <img src="img/products/<?= $row['pr_img_url'] ?><?= $img ?>">
                    </div>
                    <?php $i++;
                }
            }
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <?php
    $sql = $conn->query("SELECT * FROM products WHERE pr_id = '$_GET[id]'");
    while ($row = mysqli_fetch_assoc($sql)){ ?>
        <p class="titleu">Название: <?= $row['pr_title'] ?></p>
        <p class="titleu">Цена: <?= $row['pr_price'] ?>тг</p>

    <?php }
    ?>
    <div class="buttonns">

        <?php
        // Надо Соеденить 2 Роу products & Cart
        if (isset($_SESSION['name'])) {


            $query = $conn->query("SELECT * FROM cart WHERE cart_pr_id = '$_GET[id]' and cart_client_id = '$_SESSION[client_id]'");
            if (mysqli_num_rows($query) > 0) {
                echo '<a href="cart" class="btn-buy" id="btn_suy"> <i class="fas fa-cart-plus"></i> в Корзине</a>';
            } else {
                echo '<span class="btn-buy" id="btn_buy"> <i class="fas fa-cart-plus"></i> Купить</span>';
            }
        } else {
            echo '<span data-toggle="modal" data-target="#btn_suy" class="btn-buy"> <i class="fas fa-cart-plus"></i> Купить</span>';
        }
        ?>
        <?php
        $query = $conn->query("SELECT * FROM products WHERE pr_id = $_GET[id] ");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <span id="btn_like" class="btn-like"><i class="fas fa-info-circle"></i> Описание</span>
    </div>

    <p class="opisanie-tovara" id="txt_tovar"><?= $row['pr_mini'] ?></p>
<?php }
?>
    <footer>
        <div class="container" style="clear: left; margin-top: 30%; ">
            <div class="row">
                <div class="col">
                    <p class="text-center" style="margin-top: 20px;">Smart Market <br> Все права защищены <br> 2018 - 2020</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php include "includes/scripts.php"; ?>


<?php
$query = $conn->query("SELECT * FROM products WHERE pr_id = $_GET[id] ");
while ($row = mysqli_fetch_assoc($query)) {
    $images = explode('|', $row['pr_img']);
    ?>
    <!-- AJAX ЗАпрос Товара -->
    <form id="inpu" method="POST">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="title" value="<?= $row['pr_title'] ?>">
        <input type="hidden" name="price" value="<?= $row['pr_price'] ?>">
        <input type="hidden" name="image" value="<?= $images[0] ?>">
        <input type="hidden" name="url" value="<?= $row['pr_img_url'] ?>">
    </form>

<?php }
?>
<!--============================  MODAL =============================================================================================-->

<div class="modal" id="btn_suy">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Заполните поле или авторизуйтесь</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST">
                    <input class="form-control mb-1" type="text" placeholder="Имя">
                    <input class="form-control mb-1" type="text" placeholder="Номер">
                    <input class="btn btn-success w-100" type="submit" value="Купить">
                </form>
                <a href="auth"><i class="far"></i> Авторизация</a>
            </div>

        </div>
    </div>
</div>
<p id="click"></p>

<script>
    $(document).ready(function() {
        $("#btn_like").click(function() {
            $("#txt_tovar").toggle();
        });
    });
    // AJAX ЗАпрос Товара
    $('#btn_buy').click(function(e) {
        $('#btn_buy').attr('в Корзине');
        location.reload();

        var str = $('#inpu').serialize();
        $.ajax({
            method: 'post',
            url: "cart",
            data: str,
            success: function(data) {}
        });

    });
    $(".mySlides").swipeRight();
</script>

</body>
</html>

