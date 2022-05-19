<?php
include_once('db/db.php');

// 가게하나 불러오기
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
function select_store_menus(&$param)
{
    $store_num = $param['store_num'];

    $conn = get_conn();
    $sql = "SELECT * FROM t_menu WHERE store_num={$store_num}";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result;
}
// 메뉴하나 불러오기
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
// 가게 리뷰들 불러오기
function select_store_review(&$param)
{
    $store_num = $param['store_num'];

    $conn = get_conn();
    $sql = "SELECT A.*, B.nickname FROM t_review A 
    INNER JOIN t_user B
    ON A.user_num = B.user_num
    WHERE store_num={$store_num} ORDER BY review_num DESC";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result;
};
// 별 점수마다 개수와 총합 총개수
function select_store_stars(&$param)
{
    $store_num = $param['store_num'];

    $conn = get_conn();
    $sql = "SELECT COUNT(CASE WHEN star_rating=5 THEN 1 END)AS star5,
    COUNT(CASE WHEN star_rating=4 THEN 1 END)AS star4,
    COUNT(CASE WHEN star_rating=3 THEN 1 END)AS star3,
    COUNT(CASE WHEN star_rating=2 THEN 1 END)AS star2,
    COUNT(CASE WHEN star_rating=1 THEN 1 END)AS star1,
    (COUNT(CASE WHEN star_rating=5 THEN 1 END)+
    COUNT(CASE WHEN star_rating=4 THEN 1 END)+
    COUNT(CASE WHEN star_rating=3 THEN 1 END)+
    COUNT(CASE WHEN star_rating=2 THEN 1 END)+
    COUNT(CASE WHEN star_rating=1 THEN 1 END))AS star_total,
    AVG(star_rating)AS star_avg
    FROM t_review as star WHERE store_num=$store_num";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return mysqli_fetch_assoc($result);
};
