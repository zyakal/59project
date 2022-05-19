<?php
    include_once "db/db.php";

    function sel_store_list() {
        $conn = get_conn();
        $sql = "SELECT store_nm, store_photo, store_num FROM t_store";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function store_star(&$param) {
        $store_num = $param['store_num'];
        $conn = get_conn();
        $sql = "SELECT AVG(star_rating) 
        FROM t_review
        WHERE store_num = '$store_num'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function cate_name(&$param) {
        $store_num = $param['store_num'];
        $conn = get_conn();
        $sql = "SELECT A.cate_nm FROM t_categorie A
        INNER JOIN t_store B
        ON A.cate_num = B.cate_num
        WHERE B.store_num = $store_num";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    