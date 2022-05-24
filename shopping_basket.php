<?php
session_start();
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
$_SESSION['shopping_basket'][$menu_num] += $menu_count;

print_r($_SESSION['shopping_basket']);

$param = $_SESSION['shopping_basket'];
