<?php

include_once "db/db_user.php";

if(isset($_GET['user_num']))

$user_num = $_GET['user_num'];

$param = [
    'user_num' => $_GET['user_num']
];

$result = sel_user($param);

$ue = $result['user_mail'];
$uk = $result['nickname'];
$unm = $result['user_nm'];

if(isset($_POST['user_mail']))
{
    $param += [
    'nickname' => $_POST['nickname']
    ];   
    $nkname_check = nkname_check($param);
    if($nkname_check) {
    $wk = $_POST['nickname']."는 중복된 닉네임입니다. <br> 다른 닉네임을 입력해주세요.";
    }
    else{
if($_POST['user_mail'] == $result['user_mail'])
{
    if (!$_POST['user_pw']){
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

        if($_POST['user_nm'] !== "" && $_POST['nickname'] !== "" && $_POST['user_pw'] == $_POST['user_check_pw'] && $_POST['user_mail'] == $result['user_mail'])
        {        
            $param += [
                'user_mail' => $_POST['user_mail'],
                'user_pw' => $_POST['user_pw'],
                'nickname' => $_POST['nickname'],
                'user_nm' => $_POST['user_nm']
            ];
            $result = upd_user_info($param);
            header("Location: myinfo_mod.php?user_num=$user_num");
        }
    }
    else
    { ?>
<script>
    alert("이메일은 변경할 수가 없습니다.")
    location.href = "myinfo_mod.php?user_num=$user_num"
</script>
<?php
    }
}
}

