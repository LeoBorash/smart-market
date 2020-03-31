<?php session_start() ?>
<?php include("includes/db.php") ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include "includes/head.php"; ?>
</head>
<body>

<div class="container">
    <?php include "includes/top-menu.php"; ?>
    <?php
    $name = [];
    if (isset($_POST['addproduct'])) {
        $leng = count($_FILES['image']['name']);
        for ($i = 0; $i < $leng; $i++) {
            $exp = explode('.', $_FILES['image']['name'][$i]);
            $rest = $exp[0];
            $rest = $rest[0] . $rest[1] . $rest[2] . mt_rand(5, 15000);;
            $exp = end($exp);
            $image_name = time() . $rest . "." . $exp;
            $target = "img/products/" . $image_name;
            move_uploaded_file($_FILES['image']['tmp_name'][$i], $target);
            array_push($name, $image_name, '|');
        }
        //text
        array_pop($name);

        $images = implode($name);
        $title = $_POST['title'];
        $mini = $_POST['mini'];
        $price = $_POST['price'];
        $cat = $_POST['category'];
        $data = date("Y-m-d");


        $query = $conn->query("
        INSERT INTO products(pr_title, pr_mini, pr_price, pr_img, pr_cat, pr_date,pr_status) 
        VALUES ('$title','$mini','$price','$images','$cat','$data',1)");
        if ($query) {
            echo 'Успешно';
        } else {
            echo 'Ошибка';
        }
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" class="form-control" placeholder="Название">
        <input type="text" name="price" class="form-control" placeholder="Цена">
        <textarea name="mini" class="form-control mt-1 mb-1" cols="30" rows="10"></textarea>
        <select name="category" class="form-control">
            <option value="Часы">Часы</option>
            <option value="Браслеты">Браслеты</option>
            <option value="Портмоне">Портмоне</option>
            <option value="Детский">Детский</option>
            <option value="Акция">Акция</option>
        </select>
        <div class="imgs_blocks">
            <div class="img_block position-relative form-group">
                <input name="image[]" id="exampleFile" type="file" class="img_input" style="width: 75%;">
            </div>
        </div>

        <div class="img_block ">
            <button type="button" class="add_image mt-1 btn btn-success">+</button>
        </div>
        <input type="submit" value="Добавить" name="addproduct" class="btn btn-success w-100 mt-3">
    </form>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/scripts.php"; ?>
<script>

</script>
</body>
</html>


