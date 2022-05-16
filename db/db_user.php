<?php
include_once "db.php";

function join_user(&$param) {

$user_mail = $param['user_mail'];
$user_pw = $param['user_pw'];
$user_check_pw = $param['user_check_pw'];
$nickname = $param['nickname'];
$user_nm = $param['user_nm'];

$sql = "INSERT INTO t_user
(user_mail,user_pw,nickname,user_nm)
value
('$user_mail','$user_pw','$nickname','$user_nm')
";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}