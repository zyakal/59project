<?php
include_once('db/db.php');
function select_sales_time(&$param) {
    $store_num = $param['store_num'];

    $sql = 
    "   SELECT *
        WHEN store_num = $store_num;
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return mysqli_fetch_assoc($result);
}


