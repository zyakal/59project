<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
-->

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
            $page_name = "로그인";
            include_once "header.php";
            ?>
        </header>
        <!-- main -->
        <main>
                       <div>
        <a href="">
            <div id = logo></div>
        </a>   
        </div> 
        <form action="" method="post">
        <label id="login_email">   
            <input type="text" name="user_mail" placeholder="이메일 주소 입력" >
            <!-- required oninvalid="this.setCustomValidity('이메일 주소를 입력해주세요')" oninput="setCustomValidity('')"> -->
        </label>
        <label id="login_pw">   
            <input type="text" name="user_pw" placeholder="비밀번호 입력" >
            <!-- required oninvalid="this.setCustomValidity('비밀번호를 입력해주세요.')" oninput="setCustomValidity('')"> -->
        </label>
                <div id="login_insert">
            <button type="submit"> 다음</button>
        </div> 
        </form>
        <div>
            <a href="" class="small_text email_join">이메일 회원가입</a>
            <a href="" class="small_text email_find">이메일 찾기</a>
            <a href="" class="small_text pw_find">비밀번호 찾기</a>
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