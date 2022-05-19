<?php
    include_once "db/db.php";

    function sel_store_list() {
        $conn = get_conn();
        $sql = "SELECT store_nm, store_photo FROM t_store";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
    