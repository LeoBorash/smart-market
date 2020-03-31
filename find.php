<?php session_start() ?>
<?php include("includes/db.php") ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php include "includes/head.php"; ?>
</head>

<body>

</body>
    <div class="main">
        <div class="container">
            <?php include "includes/top-menu.php"; ?>

            <div class="banner">
                <img src="img/icons/smart.jpg" height="180px" class="mb-2">
            </div>
            <?php
            $query = $conn->query("SELECT * FROM products WHERE 
        pr_title LIKE '%$_POST[search]%' or
        pr_mini LIKE '%$_POST[search]%' or
        pr_price LIKE '%$_POST[search]%' ");
            while ($row = mysqli_fetch_assoc($query)) {
                $img = explode('|', $row['pr_img']); ?>
                <div class="pr1">
                    <a href="product?id=<?= $row['pr_id'] ?>">
                        <img class="img_portret" src="img/products/<?= $row['pr_img_url'] ?>/<?= $img[0] ?>">
                        <p class="titleu"><?= $row['pr_title'] ?></p>
                    </a>
                    <p class="titleu"><?= $row['pr_price'] ?> ₸</p>
                </div>
            <?php }
            ?>
        </div>
    </div>

<?php include "includes/scripts.php"; ?>


</html>