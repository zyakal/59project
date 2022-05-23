<?php
    include_once "db/db.php";

    //카테고리 목록 받아오는 함수
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

    //list page - 원하는 가게
    function sel_result_store(&$param) {
        $conn = get_conn();
        $sql = "SELECT store_nm, store_photo, store_num FROM t_store 
            WHERE store_num = {$param['store_num']}";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    //list page - 별점구하는 함수
    function store_star(&$param) {
        $store_num = $param['store_num'];
        $conn = get_conn();
        $sql = "SELECT AVG(star_rating) as star
        FROM t_review
        WHERE store_num = '$store_num'";
        $result = mysqli_query($conn, $sql);
        if($result == null) {
            return false;
        }
        mysqli_close($conn);
        return mysqli_fetch_assoc($result);
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

    //검색어 추가 함수
    function ins_search(&$param) {
        $search_txt = explode(" ", $param['search_txt']);
        for ($i=0; $i < count($search_txt); $i++) { 
            $conn = get_conn();
            $sql = "INSERT INTO t_search
            (search)
            VALUES ('$search_txt[$i]')";
            $result = mysqli_query($conn, $sql);
        }
        mysqli_close($conn);
        return $result;
    }

    //인기검색어 함수
    function search_top_10() {
        $conn = get_conn();
        $sql = "SELECT search FROM t_search
        GROUP BY search
        ORDER BY COUNT(search) DESC
        LIMIT 10";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
    
    function search_result_list(&$param) {
        $search_txt = explode(" ", $param['search_txt']);
        $conn = get_conn();
        $sql = "SELECT A.store_num FROM t_store A
        INNER JOIN t_menu B
        ON A.store_num = B.store_num
        WHERE ";
        for ($i=0; $i < count($search_txt); $i++) { 
            $sql .= "A.store_nm LIKE '%{$search_txt[$i]}%' OR B.menu_nm LIKE '%{$search_txt[$i]}%'";
            if($i != count($search_txt)-1) {
                $sql .= " OR ";
            }
        }
        $result = mysqli_query($conn, $sql);
        return $result;
    }