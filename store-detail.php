<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/8eb4f0837a.js" crossorigin="anonymous" defer></script>
</head>

<body>
    <!-- 전체사이즈 -->
    <div class="container">
        <!-- header 인클루드해서 사용 -->
        <header>
            <?php
            include_once "store-header.html";
            ?>
        </header>
        <!-- main -->
        <main>
        <div class="store--img--box">
            <img src="https://images.unsplash.com/photo-1564327368633-151ef1d45021?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
        </div>
        <div class="store-main">
            <h1>그린 카페</h1>
            <div class="store-point">
                <div class="store-point__star">
                <i class="fa-solid fa-star"></i>
                4.5
                </div>
                <div class="store-point__star">
                <i class="fa-regular fa-heart"></i>
                단골 찜
                </div>
            </div>
            <div class="store-cummuni">
            <a href="#">
            <i class="fa-solid fa-phone"></i>
            전화하기
            </a>
            <a href="#">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            공유하기
            </a>
            </div>
        </div>
        <div class="store-tab">
            <a href="#">
                <h2>메뉴</h2>
            </a>
            <a href="#">
                <h2>정보</h2>
            </a>
            <a href="#">
                <h2>리뷰</h2>
            </a>
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