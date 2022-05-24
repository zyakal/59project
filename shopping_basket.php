<?php
include_once "db/db_store_and_menu.php";
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
    $basket[$key];
}
