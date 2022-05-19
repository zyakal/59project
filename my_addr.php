<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>59 - My address</title>
</head>
<body>
    <div class="container">
        <header>
            <?php
            $page_name = "구독 주소 설정";
            include_once "header.php";
            ?>
        </header>
        <main class="my_addr--main">
            <form action="home.php" method="post">
                <div class="my_addr--input">
                    <div class="input--top">
                        <i class='fa-solid fa-magnifying-glass'></i>
                        <input type="text" id="my_address" name="my_addr" placeholder="건물명, 도로명 또는 지번으로 검색">
                    </div>
                </div>
                <div class="my_addr--button">
                    <input type="submit" value="주소 설정">
                </div>
            </form>
        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
    </div>
</body>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
window.onload = function(){
    document.getElementById("my_address").addEventListener("click", function(){ //주소입력칸을 클릭하면
        //카카오 지도 발생
        new daum.Postcode({
            oncomplete: function(data) { //선택시 입력값 세팅
                document.getElementById("my_address").value = data.address; // 주소 넣기
            }
        }).open();
    });
}
</script>
</html>