<?php
    include('db/db_bd_home.php');
    function search_sub_for_user(&$param) {
        $user_num = $param['user_num'];
        $sql = 
        "   SELECT A.*, B.menu_nm, B.menu_photo FROM t_sub as A
            INNER JOIN t_menu as B
            ON A.menu_num = B.menu_num
            WHERE user_num = ${user_num};
        ";
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }


    