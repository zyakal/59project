<?php
    include_once "db/db.php";

    function sel_categories() {
        $conn = get_conn();
        $sql = "SELECT cate_nm FROM t_categorie";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    //list page - 전체 가게
    function sel_store_list() {
        $conn = get_conn();
        $sql = "SELECT store_nm, store_photo, store_num FROM t_store";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    //list page - 별점구하는 함수
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

    //list page - 카테고리 들고오는 함수
    function cate_name(&$param) {
        $store_num = $param['store_num'];
        $conn = get_conn();
        $sql = "SELECT A.cate_nm FROM t_categorie A
        INNER JOIN t_store B
        ON A.cate_num = B.cate_num
        WHERE B.store_num = $store_num";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return mysqli_fetch_assoc($result);     //복수일 경우 변경 해야함!!
    }

    //likestore page - 찜한 가게 불러오는 함수
    function sel_like_stores(&$param) {
        $user_num = $param['user_num'];
        $conn = get_conn();
        $sql = "SELECT B.store_nm, B.store_photo, B.store_num FROM t_likestore A
        INNER JOIN t_store B
        ON A.store_num = B.store_num
        WHERE A.user_num = $user_num";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    