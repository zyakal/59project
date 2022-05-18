<?php
include_once('db/db.php');
function select_one_store(&$param)
{
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

// 가게메뉴들 불러오기
function sel_store_menu(&$param)
{
    $store_num = $param['store_num'];

    $conn = get_conn();
    $sql = "select * from t_menu where store_num={$store_num}";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result;
}

function select_one_menu(&$param)
{
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
