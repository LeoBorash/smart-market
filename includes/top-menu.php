<div class="first-menu">
    <i class="fas fa-bars float-left" onclick="openNav()"></i>
    <form action="find" method="post">
        <input type="search" name="search" class="form-control mt-2 float-left search-top" placeholder="Поиск...">
    </form>


    <!--============================  Cart =============================================================================================-->
    <?php
    if (!isset($_SESSION['client_id'])) {
        $query = $conn->query("SELECT * FROM cart WHERE cart_client_id = '$_SESSION[client_id]'");
        if (mysqli_num_rows($query) > 0) { ?>
            <a href="cart" style="text-decoration: none">
                <i class="fas fa-shopping-cart mr-0"></i>
                <span class="cart-dot">+</span>
            </a>
        <?php } else { ?>
            <a href="cart" style="text-decoration: none">
                <i class="fas fa-shopping-cart mr-0"></i>
            </a>
        <?php }
    } else { ?>
        <span data-toggle="modal" data-target="#myModal">
                <i class="fas fa-shopping-cart mr-0"></i>
            </span>
    <?php }
    ?>
    <!--    <a href="" data-toggle="modal" data-target="#myModal"><i class="fas fa-shopping-cart mr-0"></i>dwad</a>-->
    <!--    -->
</div>

<!--============================  MODAL =============================================================================================-->

<?php if (!isset($_SESSION['name'])) { ?>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title">Пожалуйста авторизуйтесь</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <a href="auth">Авторизация</a>
                </div>

            </div>
        </div>
    </div>
<?php } else{
}
?>

<!--==================================================================================================================================-->
<div id="mySidenav" class="sidenav">
    <div class="logotip">
        <img class="sidebar-logo" src="/img/icons/smart.png" style="margin: 0 auto;">
        <div class="sidebar-auth">
            <?php
            if (isset($_SESSION['name'])) { ?>
                <a href="profile"> <?= $_SESSION["name"] ?> </a>
            <?php } else { ?>
                <a href="auth" style="float: left;">Вход | </a>
                <a href="reg">Регистрация</a>
            <?php }
            ?>

        </div>

    </div>
    <!--==================================================================================================================================-->
    <div class="sidebar-li">
        <a href="#" style="border: none" class="closebtn" onclick="closeNav()">×</a>
        <?php
        if ($_SESSION['client_status'] > 0) {
            echo '<a href="add">Добавить товара</a>';
        }
        ?>
        <a href="/"> <img src="/img/icons/home.png"> Главная</a>
<!--        <a href="/?cat=Акция"><img src="/img/icons/gift.png"> 1+1</a>-->
        <a href="/?cat=Часы"><img src="/img/icons/watch-man.png"> Часы</a>
        <a href="/?cat=Браслеты"><img src="/img/icons/bracer.png"> Браслеты</a>
        <a href="/?cat=Портмоне"><img src="/img/icons/wallet.png"> Портмоне</a>
        <a href="/?cat=Детские"><img src="/img/icons/child.png"> Детские</a>
        <a href="/?cat=Электроника"><img src="/img/icons/electronics.png"> Электроника</a>
		<a href="partner"><img src="/img/icons/star.png"> Партнеры</a>

<!--        <a href="#"><img src="/img/icons/star.png"> О нас</a>-->
<!--        <a href="#"><img src="/img/icons/contacts.png"> Контакты</a>-->
        <?php
        if (isset($_SESSION['name'])) { ?>
            <a href="exit"><i class="fas fa-exit"></i> Выход</a>
        <?php }
        ?>

    </div>
</div>