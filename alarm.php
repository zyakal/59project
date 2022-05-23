<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
-->
<?php
$page_name = "알림";

session_start();
$login_user = $_SESSION['login_user'];

if(!$login_user)
{
    header("Location:mypage.php");
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
            include_once "header.php";
            ?>
        </header>
        <!-- main -->
        <main>


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

<!-- //http://www.ciboard.co.kr/manual/tables/notification
상품 주문
 →  
확인전 0 
주문확인 
주문중
픽업대기
주문취소(주인거절, 주인취소,  사용자취소)
수령완료(사용자거절)


구독 만료 전 날 연장 여부 알림

수령완료 후 
예전 알림 숨기기 클릭하면 보이고
-->