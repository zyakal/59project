<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
-->
<?php
include_once "db/db_user.php";
        session_start();
        $login_user = $_SESSION['login_user'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내정보</title>
    <script src="https://kit.fontawesome.com/8eb4f0837a.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- 전체사이즈 -->
    <div class="container">
        <!-- header 인클루드해서 사용 -->
        <header>
            <?php
            $page_name = "내 정보 수정";
            include_once "header.php";
            ?>
        </header>
        <!-- main -->
        <main>
            <div class = "flex_box">
        <div class="info_mail">
            <div class="info_type">이메일 아이디</div>
            <div class="myinfo_text"><?=$login_user['user_mail']?> <button class="upd_button">변경</button></div>
        </div>
        <div class="info_div">
            <div class="info_type"> 비밀번호</div>
            <div class="myinfo_text"><?=$login_user['user_pw']?></div>
        </div>
        <div class="info_div">
            <div class="info_type">휴대전화 번호</div>
            <div class="myinfo_text"><?=$login_user['user_phnum']?><button class="upd_button">변경</button></div>
        </div>
        <div class="info_div">
            <div class="info_type">닉네임</div>
            <div class="myinfo_text"><?=$login_user['nickname']?><button class="upd_button">변경</button></div>
        </div>
            </div>
        </main>
        <!-- footer 인클루드해서 사용 -->
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
    </div>
</body>

</html>