<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
-->


<?php 

include_once "db/db_user.php";

$we = "";
$wp = "";

if(isset($_POST['user_email']))
{
$user_email = $_POST['user_email'];
$user_pw = $_POST['user_pw'];

        if (!$user_email) {
        $we = "이메일을 입력해주세요.";
    }
        if (!$user_pw) {
        $wp = "비밀번호를 입력해주세요.";
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
    <meta name="viewport" content="wclassth=device-wclassth, initial-scale=1.0">
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
            $page_name = "로그인";
            include_once "header.php";
            ?>
        </header>
        <!-- main -->
        <main>
            <div class="flex_box">
                       <div>
        <a href="">
            <div class = logo></div>
        </a>   
        </div> 
        <form action="Email_login.php" method="post">
        <div>
        <label class="login_email">   
            <input type="text" name="user_email" placeholder="이메일 주소 입력" >
        </label>
        <p class="warning_massage"><?=$we?></p>
        </div>
        <div>
        <label class="login_pw">   
            <input type="text" name="user_pw" placeholder="비밀번호 입력" >
        </label>
        <p class="warning_massage"><?=$wp?></p>
        </div>
                <div class="login_insert">
            <button type="submit"> 다음</button>
        </div> 
        </form>
        <div class="small_flex_box">
            <a href="" class="small_text">이메일 회원가입</a>
            <a href="" class="small_text">이메일 찾기</a>
            <a href="" class="small_text">비밀번호 찾기</a>
        </div>
        </main>
        <!-- footer 인클루드해서 사용 -->
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
        </div>
    </div>
</body>

</html>