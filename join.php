<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
회원가입 페이지
-->
<?php 

include_once "db/db_user.php";

if(isset($_POST['user_email']))
{
$user_email = $_POST['user_email'];
$user_pw = $_POST['user_pw'];
$user_check_pw = $_POST['user_check_pw'];
$nickname = $_POST['nickname'];
$user_nm = $_POST['user_nm'];

    $conn = get_conn();
    $wp = "";
    if ($user_pw !== $user_check_pw) {
        $wp = "비밀번호가 일치하지 않습니다.";
    }}
        if ($user_pw !== $user_check_pw) {
        $wp = "비밀번호가 일치하지 않습니다.";
    }}
        if ($user_pw !== $user_check_pw) {
        $wp = "비밀번호가 일치하지 않습니다.";
    }}
        if ($user_pw !== $user_check_pw) {
        $wp = "비밀번호가 일치하지 않습니다.";
    }}
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
            <form name="frm" action="join.php" method="post">
        <label id="join_email">   
        이메일주소
            <input type="text" name="user_email" placeholder="이메일 주소 입력" >
            <!-- required oninvalid="this.setCustomValidity('이메일 주소를 입력해주세요')" oninput="setCustomValidity('')"> -->
        </label>
        <p></p>
                <label id="join_pw">   
        비밀번호
            <input type="password" name="user_pw" placeholder="영문,숫자,특수문자 포함 8자리 이상" >
            <!-- required oninvalid="this.setCustomValidity('비밀번호를 입력해주세요.')" oninput="setCustomValidity('')"> -->
        </label>
        <label id="join_pw_check"> 
             비밀번호 확인
            <input type="password" name="user_check_pw" placeholder="영문,숫자,특수문자 포함 8자리 이상" >
            <!-- required oninvalid="this.setCustomValidity('비밀번호를 입력해주세요.')" oninput="setCustomValidity('')"> -->
        </label>
        <p class="warning_massage"><?=$wp?></p>
                <label id="join_nkname">   
        닉네임
            <input type="text" name="nickname" placeholder="닉네임 입력" >
            <!-- required oninvalid="this.setCustomValidity('닉네임을 입력해주세요.')" oninput="setCustomValidity('')"> -->
        </label>
        <p></p>
                <label id="join_nm">   
        이름
            <input type="text" name="user_nm" placeholder="이름 입력" >
            <!-- required oninvalid="this.setCustomValidity('이름을 입력해주세요.')" oninput="setCustomValidity('')" -->
        </label>
        <p></p>
        <div id="join_insert">
            <button type="submit" name="joinbtd" onclick="InputCheckReq()"> 다음</button>
        </div>      
        </form>
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

<!-- <script>
    function InputCheckReq() {
        let form = document.frm;
        if(form.user_mail.value == ""){
            window.alert("이메일 주소를 입력해주세요. (필수)")
            form.user_mail.value = null;
            form.user_mail.focus();
            return false
        }
    
        if(form.user_pw.value == ""){
            window.alert("비밀번호를 입력해주세요. (필수)")
            form.user_pw.value = null;
            form.user_pw.focus();
            return false
        }
            if(form.nickname.value == ""){
            window.alert("닉네임을 입력해주세요. (필수)")
            form.nickname.value = null;
            form.nickname.focus();
            return false
        }
            if(form.user_nm.value. == ""){
            window.alert("이름을 입력해주세요. (필수)")
            form.user_nm.value = null;
            form.user_nm.focus();
            return false
        }
    }
else{
    $('#loding').show()
    form.method = "POST"
    form.action = "join_proc.php"
    form.submit();
}
</script> -->