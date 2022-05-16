<?php
include_once('db/db_bd_home.php');
function select_one_store(&$param) {
    $store_num = $param['store_num'];

    $sql = 
    "   SELECT * FROM t_store
        WHERE store_num = ${store_num};
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return mysqli_fetch_assoc($result);
}


function select_one_menu(&$param) {
    $menu_num = $param['menu_num'];

    $sql = 
    "   SELECT * FROM t_menu
        WHERE menu_num = ${menu_num}
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return mysqli_fetch_assoc($result);
}

