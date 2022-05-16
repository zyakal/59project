<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
회원가입 페이지
-->
<?php 

include_once "db/db_user.php";

$we = "";
$wp = "";
$wk = "";
$wnm = "";

if(isset($_POST['user_email']))
{
$user_email = $_POST['user_email'];
$user_pw = $_POST['user_pw'];
$user_check_pw = $_POST['user_check_pw'];
$nickname = $_POST['nickname'];
$user_nm = $_POST['user_nm'];


    if ($user_pw !== $user_check_pw) {
        $wp = "비밀번호가 일치하지 않습니다.";
    }
        if (!$user_email) {
        $we = "이메일을 입력해주세요.";
    }
        if (!$nickname) {
        $wk = "닉네임을 입력해주세요.";
    }
        if (!$user_nm) {
        $wnm = "이름을 입력해주세요";
        }
        else {        
 
        }
        }
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
    <!-- 전체사이즈 -->
    <div class="container">
        <!-- header 인클루드해서 사용 -->
        <header>
            <?php
            $page_name = "회원가입";
            include_once "header.php";
            ?>
        </header>
        <!-- main -->
        <main>
            <div class="form_box">
            <form name="frm" action="join.php" method="post">

        <div class="join_email">
            <label for="email">   
            이메일주소</label>
            <input type="text" id="email" name="user_email" placeholder="이메일 주소 입력" >
        <p class="warning_massage"><?=$we?></p>
        </div>        

        <div class="join_pw">
        <label for="user_pw">비밀번호</label>
            <input type="password" id="user_pw" name="user_pw" placeholder="영문,숫자,특수문자 포함 8자리 이상" >
        </div>
<div class="join_pw_check">
        <label for=""> 
             비밀번호 확인        </label>
            <input type="password" id="user_check_pw" name="user_check_pw" placeholder="영문,숫자,특수문자 포함 8자리 이상" >
        <p class="warning_massage"><?=$wp?></p>
        </div>

        <div class="join_nkname">
        <label id="join_nkname">   
        닉네임</label>
            <input type="text" name="nickname" placeholder="닉네임 입력" >
            <!-- required oninvalid="this.setCustomValidity('닉네임을 입력해주세요.')" oninput="setCustomValidity('')"> -->
         <p class="warning_massage"><?=$wk?></p>
        </div>

        <div class="join_nm">
         <label for="user_nm">   
        이름        </label>
            <input type="text" id="user_nm" name="user_nm" placeholder="이름 입력" >
            <!-- required oninvalid="this.setCustomValidity('이름을 입력해주세요.')" oninput="setCustomValidity('')" -->
        <p class="warning_massage"><?=$wnm?></p>
        </div>

        <div class="join_insert">
            <button type="submit" name="joinbtd" onclick="InputCheckReq()"> 다음</button>
        </div>      
        </form>
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