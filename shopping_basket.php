<?php
include_once "db/db_store_and_menu.php";
$page_name = "장바구니";
session_start();

// php세션안쓰고 걍 자바스크립트로 새로 짜는게 낫겟네..

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

if (isset($_SESSION['shopping_basket'])) {
    print_r($_SESSION['shopping_basket']);
    $php_ss_copy = $_SESSION['shopping_basket'];
} else {
    $php_ss_copy = [];
}
if (!isset($php_ss_copy[$menu_num])) {
    $php_ss_copy[$menu_num] = 0;
}
$php_ss_copy[$menu_num] += $menu_count;

?>
<script>
    let menuNum = <?= $menu_num ?>;
    let menuCount = <?= $menu_count ?>;
    console.log(menuNum + ":" + menuCount);
    let beforeCount = sessionStorage.getItem("<?= $menu_num ?>");
    console.log(beforeCount);
    if (beforeCount == null) {
        beforeCount = 0;
    }
    sessionStorage.setItem(menuNum, Number(beforeCount) + Number(menuCount));
    console.log(sessionStorage);

    fetch(`change_basket_count.php?menu_num=${menuNum}&menu_count=${menuCount}&pm=1`)
        .then((response) => {
            return response;
        });
</script>


<?php
print_r($php_ss_copy);
$param = $php_ss_copy;
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
                        <div class="basket__nm-price">
                            <div class="basket__store-nm"><?= $v['store_nm'] ?></div>
                            <div class="basket__price"><?= $v['subed_price'] * $_SESSION['shopping_basket'][$k] ?>원</div>
                        </div>
                        <div class="basket__menu-count">
                            <div class="basket__change-count" onclick="changeCount(<?= $k ?>,0)">-</div>
                            <?php
                            echo "<div id='count$k'></div>";
                            ?>
                            <div class="basket__change-count" onclick="changeCount(<?= $k ?>,1)">+</div>
                        </div>

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
<script>
    function changeCount(num, pm) {
        console.log(num);
        fetch(`change_basket_count.php?menu_num=${num}&menu_count=1&pm=${pm}`)
            .then((response) => {
                return response;
            });
        let nc = sessionStorage.getItem(num);
        if (pm) {
            sessionStorage.setItem(Number(num), Number(nc) + 1);
        } else {
            sessionStorage.setItem(Number(num), Number(nc) - 1);
        }
        console.log(sessionStorage);
        setCount(num);
    }

    function setCount(num) {
        document.querySelector(`#count${num}`).textContent = "";
        document.querySelector(`#count${num}`).textContent = sessionStorage.getItem(num);
    }
</script>