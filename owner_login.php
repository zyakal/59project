<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
-->
<?php
include_once "db/db_store_login.php";

$we = "";
$wp = "";

//아이디 또는 비밀번호 일치하는지 체크 후 로그인
if(isset($_POST['owner_email']) && isset($_POST['owner_password']))
{
$param = [
        'owner_email' => $_POST['owner_email'],
        'owner_password' => $_POST['owner_password']
        ];
        
    // $result = owner_login($param);

    if(empty($result))
    {
        $wp = "아이디 또는 비밀번호가 틀렸습니다.";
    }
    if(!empty($result))
    {        
            $user_num = $result['user_num'];
            header("Location: owner_login.php");
    }
}

//이메일 비밀번호 공백이면 뜨는 알림
if(isset($_POST['owner_email']))
{
if ($_POST['owner_email'] == "") {
        $we = "이메일을 입력해주세요.";
    }
if ($_POST['owner_password'] == "") {
        $wp = "비밀번호를 입력해주세요.";
    }
}
    ?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/8eb4f0837a.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class = "all_page">
        <main>
        <div class = "owner_page">
        <div class = "owner_login_page_flex">
            <div class ="owner_join_page">
                <div class = "owner_join_bigfont">사장님 회원가입</div>
                <div class = "owner_join_smallfont">오구 아이디로 모든 <br> 오구 관리자 서비스를 이용할 수 있습니다.</div>
                <div><button onclick = "location.href = 'owner_join.php'">회원가입</button></div>
            </div>
            <div class ="owner_login_page">
                <div class = "owner_login_logo">로그인</div>
                <a href=""><div class = "owner_login_grayfont">이메일로 로그인</div></a>
                <div class = "owner_input">
                    <form action="owner_login.php" method="post">
                        <div class = "owner_img_rel_mail">
                            <label>
                                <i class="fa-regular fa-envelope fa-xl"></i>
                                <input type="text" name = "owner_email" placeholder = "이메일">
                            </label>
                            <p class = "owner_warning_massage"><?=$we?></p>
                        </div>
                        <div class = "owner_img_rel_lock">
                            <label>
                                <i class="fa-solid fa-unlock-keyhole fa-xl"></i>
                                <input type="password" name = "owner_password" placeholder = "비밀번호">
                            </label>
                            <p class = "owner_warning_massage"><?=$wp?></p>
                        </div>
                        <!-- <button type="submit">로그인</button> -->
                    </form>
                </div>
            </div>
        </div>
        </div>
        </main>
    </div>
</body>

</html>