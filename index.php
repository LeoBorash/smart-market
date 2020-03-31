<?php session_start() ?>
<?php include_once("includes/db.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/head.php"; ?>
</head>

<body>
    <div class="container">
        <?php include "includes/top-menu.php"; ?>

        <div class="banner">
            <img src="img/icons/smart.jpg" height="180px" class="mb-2">
        </div>
        <?php
        if (isset($_GET['cat'])) { ?>
        <h4 class="titles clears"> <?= $_GET['cat'] ?></h4>
        <div class="row align-self-center">
            <?php
                $query = $conn->query("SELECT * FROM products WHERE pr_cat = '$_GET[cat]' ORDER BY pr_date DESC");
                while ($row = mysqli_fetch_assoc($query)) {
                    $img = explode('|', $row['pr_img']);
                ?>
            <div class="col-6 tovar">
                <div class="tovar__in">
                    <a href="product?id=<?= $row['pr_id'] ?>">
                        <img class="img_portret fods" src="img/products/<?= $img[0] ?>">
                    </a>
                    <div class="fod">
                        <p class="titleu "><?= $row['pr_title'] ?></p>
                        <p class="titleu__mini"><?= mb_strimwidth($row['pr_mini'], 0, 25, '...') ?></p>
                        <hr class="line">
                        <span class="titleu "><?= $row['pr_price'] ?>тг</span>
                        <span class="old-price"><?= $row['old_price'] ?>тг</span>
                        <a href="product?id=<?= $row['pr_id'] ?>" class="float-right mr-3">
                            <i style="font-size: 20px" class="fas fa-cart-arrow-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php }
                ?>
        </div>
        <?php
        } else { ?>
        <h4 class="titles clears">Новое поступление</h4>
        <div class="row align-self-center backgr">
            <?php
                $query = $conn->query("SELECT * FROM products WHERE pr_status > 0 ORDER BY pr_date DESC");
                while ($row = mysqli_fetch_assoc($query)) {
                    $img = explode('|', $row['pr_img']);
                ?>
            <div class="col-6 tovar">
                <div class="tovar__in">
                    <a href="product?id=<?= $row['pr_id'] ?>">
                        <img class="img_portret fods" src="img/products/<?= $img[0] ?>">
                    </a>
                    <div class="fod">
                        <p class="titleu "><?= $row['pr_title'] ?></p>
                        <p class="titleu__mini"><?= mb_strimwidth($row['pr_mini'], 0, 25, '...') ?></p>
                        <hr class="line">
                        <span class="titleu "><?= $row['pr_price'] ?>тг</span>
                        <span class="old-price"><?= $row['old_price'] ?>тг</span>
                        <a href="product?id=<?= $row['pr_id'] ?>" class="float-right mr-3">
                            <i style="font-size: 20px" class="fas fa-cart-arrow-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php }
                ?>
        </div>
        <?php }
        ?>

    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/scripts.php"; ?>

</body>

</html>