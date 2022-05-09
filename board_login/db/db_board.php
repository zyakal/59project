<?php
    include_once "db.php";
    
function ins_board(&$param)
    {
        $title = $param["title"];
        $ctnt = $param["ctnt"];
        $i_user = $param["i_user"];

        $conn = get_conn();
        $sql = 
        "   INSERT INTO t_board
            (title, ctnt, i_user)
            VALUES
            ('$title', '$ctnt', $i_user)
        "; 

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
        
 }
  
 function sel_paging_count(&$param) {
    $row_count = $param["row_count"];
    $sql = "SELECT CEIL(COUNT(i_board) / $row_count) as cnt
              FROM t_board";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); 
    $row = mysqli_fetch_assoc($result);
    return $row["cnt"];
}

 function sel_board_list(&$param)
 {    
    $start_idx = $param["start_idx"];
    $row_count = $param["row_count"];
    $conn = get_conn();
    $sql =
    "   SELECT A.i_board, A.title, A.ctnt, B.nm, A.created_at 
        FROM t_board A 
        INNER JOIN t_user B 
        ON A.i_user = B.i_user    
        ORDER BY i_board DESC
        LIMIT $start_idx, $row_count";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
 }

function sel_board(&$param) {
    $i_board = $param["i_board"];
    $conn = get_conn();
    $sql =
    "   SELECT A.title, A.ctnt, B.nm, A.created_at, A.i_user 
        FROM t_board A 
        INNER JOIN t_user B 
        ON A.i_user = B.i_user
        WHERE i_board = $i_board ";    
        
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return mysqli_fetch_assoc($result);
}

function mod_board(&$param) {
    $i_board = $param["i_board"];
    $title = $param["title"];
    $ctnt = $param["ctnt"];
    $i_user = $param["i_user"];
    
    $conn = get_conn();
    $sql = 
    "   UPDATE t_board 
        SET title = '$title', ctnt = '$ctnt'
        WHERE i_board = $i_board
        AND i_user = $i_user
    ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
    
}

function del_board(&$param) {
    $i_board = $param["i_board"];
    $i_user = $param["i_user"];

    $conn = get_conn();
    $sql =
    "   DELETE FROM t_board
        WHERE i_board = $i_board
        AND i_user = $i_user;
    ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function sel_next(&$param){
    $i_board = $param["i_board"];
    $conn = get_conn();
    $sql =
    "   SELECT i_board        
        FROM t_board
        WHERE i_board > $i_board
        ORDER BY i_board DESC
        LIMIT 1
    ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    $row = mysqli_fetch_assoc($result);
    if($row) { return $row["i_board"];}
    return 0;
}

function sel_prev(&$param){
    $i_board = $param["i_board"];
    $conn = get_conn();
    $sql =
    "   SELECT i_board        
        FROM t_board
        WHERE i_board < $i_board
        ORDER BY i_board DESC
        LIMIT 1
    ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    $row = mysqli_fetch_assoc($result);
    if($row) { return $row["i_board"];}
    return 0;
}