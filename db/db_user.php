<?php
include_once "db.php";

function join_user(&$param) {

$user_mail = $param['user_mail'];
$user_pw = $param['user_pw'];
$nickname = $param['nickname'];
$user_nm = $param['user_nm'];

$sql = "INSERT INTO t_user
(user_mail,user_pw,nickname,user_nm)
value
('$user_mail',password('$user_pw'),'$nickname','$user_nm')
";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function id_check(&$param)
{
    $user_mail = $param['user_mail'];

    $sql = "SELECT user_mail 
            from t_user
            where user_mail = '$user_mail' 
    ";
    $conn = get_conn();
    $row = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($row);
    mysqli_close($conn); 
    if(isset($result['user_mail']))
    {
    return true;
    }
    return false;
}

function nkname_check(&$param)
{
    $nickname = $param['nickname'];

    $sql = "SELECT nickname 
            from t_user
            where nickname = '$nickname' 
    ";
    $conn = get_conn();
    $row = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($row);
    mysqli_close($conn); 
    if(isset($result['nickname']))
    {
    return array(false,$result['nickname']);
    }
    return array(true);
}

function login_user(&$param){

        $user_mail = $param['user_mail'];
        $user_pw = $param['user_pw'];

            $sql = "SELECT *
            from t_user 
            where user_mail = '$user_mail' and user_pw = password('$user_pw')
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    if(!empty($row))
    {       session_start();
            $_SESSION['login_user'] = $row;
    }
    return $row;
}

function sel_user(&$param)
{
    $user_num = $param['user_num'];

    $sql = "SELECT * from t_user where user_num = $user_num
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    if(!empty($row))
    {       session_start();
            $_SESSION['login_user'] = $row;
    }
    return $row;
}

function upd_user_info(&$param)
{
        $user_num = $param['user_num'];
        $user_mail = $param['user_mail'];
        $user_pw = $param['user_pw'];
        $nickname = $param['nickname'];
        $user_nm = $param['user_nm'];

    $sql = "UPDATE t_user
            SET user_mail = '$user_mail',
            user_pw = password('$user_pw'),
            nickname = '$nickname',
            user_nm = '$user_nm'
            WHERE user_num = '$user_num'
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function mailCheck($_str)
// 아이디 이메일형식 정규화
{
    if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_str) == false)
    {
        return array(false,"올바른 이메일 주소를 입력해주세요.");
    }
    else
    {
        return array(true);
    }
}

function passwordCheck($_str)
// 비밀번호 정규화
{
    $pw = $_str;
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
 
    if(strlen($pw) < 10 || strlen($pw) > 30)
    {
        return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.");
        exit;
    }
 
    if(preg_match("/\s/u", $pw) == true)
    {
        return array(false, "비밀번호는 공백없이 입력해주세요.");
        exit;
    }
 
    if( $num == 0 || $eng == 0 || $spe == 0)
    {
        return array(false, "영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
        exit;
    }
 
    return array(true);
}

function user_Hours_of_use(&$param)
{
    $created_at = $param['created_at'];
    $sub_created_at = mb_substr($created_at,0,10);

$firstDate = $sub_created_at;
$secondDate = date("Y-m-d");

$dateDifference = abs(strtotime($secondDate) - strtotime($firstDate));

$years  = floor($dateDifference / (365 * 60 * 60 * 24));
$months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
$days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));

echo "${years}" . '년 ' . "${months}" . '월 ' . "${days}" . "일 " ;
}

function all_discount_price(&$param)
{
    $user_num = $param['user_num'];
    
    $sql = "SELECT sum(save_price) from t_sub where user_num = $user_num
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row['sum(save_price)'];

} 