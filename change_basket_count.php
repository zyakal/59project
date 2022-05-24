<?php
$menu_num = $_GET['menu_num'];
$menu_count = $_GET['menu_count'];
$pm = $_GET['pm'];

session_start();

if (!isset($_SESSION['shopping_basket'])) {
    $_SESSION['shopping_basket'] = [];
}

if (!isset($_SESSION['shopping_basket'][$menu_num])) {
    $_SESSION['shopping_basket'][$menu_num] = 0;
}
if ($pm) {
    $_SESSION['shopping_basket'][$menu_num] += $menu_count;
} else {
    $_SESSION['shopping_basket'][$menu_num] -= $menu_count;
    if ($_SESSION['shopping_basket'][$menu_num] == 0) {
        unset($_SESSION['shopping_basket'][$menu_num]);
    }
}

print 1;
