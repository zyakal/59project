<?php

    include_once 'db.php';


    $conn = get_conn();
    $i_board = $_POST['i_board'];
    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];

    $sql = " UPDATE t_board2 SET title='$title', ctnt='$ctnt', mod_at=now() WHERE i_board = $i_board ";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("location: detail.php?i_board=$i_board");
?>