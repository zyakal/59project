<?php

    include_once "db/db_user.php";


if(isset($_POST['user_mail']))
{
if ($_POST['user_mail'] == "") {
        $we = "이메일을 입력해주세요.";
}
else 
{
    $param = [
        'user_mail' => $_POST['user_mail'],
        'nickname' => $_POST['nickname']
    ];

    $id_check = id_check($param);
    $nkname_check = nkname_check($param);

    if($id_check) {
      $we = $_POST["user_mail"]."는 중복된 아이디입니다. <br> 다른 아이디를 입력해주세요.";
    }
    if($nkname_check) {
      $wk = $_POST['nickname']."는 중복된 닉네임입니다. <br> 다른 닉네임을 입력해주세요.";
    }
    if (!$_POST['user_pw'])
    {
        $wp = "비밀번호를 입력해주세요.";
    }
    if ($_POST['user_pw'] !== $_POST['user_check_pw']) {
        $wp = "비밀번호가 일치하지 않습니다.";
    }

        if (!$_POST['nickname']) {
        $wk = "닉네임을 입력해주세요.";
    }
        if (!$_POST['user_nm']) {
        $wnm = "이름을 입력해주세요";
        }

        if(!$id_check && !$nkname_check && $_POST['user_nm'] !== "" && $_POST['nickname'] !== "" && $_POST['user_pw'] == $_POST['user_check_pw'] && $_POST['user_mail'] !== "")
        {        
            $param += [
                'user_pw' => $_POST['user_pw'],
                'user_nm' => $_POST['user_nm']
            ];
            join_user($param);
            header("Location: login.php");
        }
    }
}