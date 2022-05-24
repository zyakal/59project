<?php
include_once "db/db_store_and_menu.php";
$page_name = "장바구니";
session_start();

//작업용 임시
$_SESSION['login_user']['user_num'] = 1;

if (isset($_SESSION['login_user'])) {
    $login_user = $_SESSION['login_user'];
} else {
    echo "<script>
    alert('로그인 후 이용 가능합니다.');
    window.location.href = 'home.php';
    </script>";
}

$menu_num = $_POST['menu_num'];
$menu_count = $_POST['menu_count'];

if (!isset($_SESSION['shopping_basket'])) {
    $_SESSION['shopping_basket'] = [];
}

if (!isset($_SESSION['shopping_basket'][$menu_num])) {
    $_SESSION['shopping_basket'][$menu_num] = 0;
}

$_SESSION['shopping_basket'][$menu_num] += $menu_count;

$param = $_SESSION['shopping_basket'];
$result = get_menus_for_shopping($param);

$basket = [];
foreach ($result as $list) {
    $key = $list['menu_num'];
    $basket[$key] = $list;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/screens/shopping_basket.css" />
    <link rel="stylesheet" href="css/styles_std.css">
    <title>장바구니</title>
</head>

<body>
    <div class="container">

        <header>
            <?php
            include_once "header.php";
            ?>
        </header>

        <main>
            <div class="basket-container">
                <?php foreach ($basket as $k => $v) {   ?>
                    <div class='basket__box'>
                        <div class="basket__img">
                            <img src="<?= $v['menu_photo'] ?>">
                        </div>
                        <div class="basket__menu-nm"><?= $v['menu_nm'] ?></div>
                        <div class="basket__store-nm"><?= $v['store_nm'] ?></div>
                        <div class="basket__price"><?= $v['subed_price'] * $_SESSION['shopping_basket'][$k] ?></div>

                    </div>
                <?php }   ?>
            </div>
        </main>

        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
    </div>
</body>

</html>