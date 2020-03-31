<?php
include "includes/db.php";

$query = $conn->query("SELECT * FROM cart");
while ($row = mysqli_fetch_assoc($query)){
    ?>
    <form action="" id="forma" method="post">
        <input type="text" name="gete[]" value="<?=$row['cart_pr_title']?>">
    </form>
<?php }
?>
<span id="good">SEND</span>
<?php
if (isset($_POST['gete'])){
   $query=$conn->query("INSERT INTO test(name)VALUES ('$_POST[gete]')");
   echo 'Успешно';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include "includes/scripts.php"; ?>
<script>
    $('#good').click(function () {
        var good = $('#forma').serialize();
        $.ajax({
           method: 'post',
           url: 'test',
           data: good,
           success: function (data) {

           }
        });
    });
</script>
</body>
</html>