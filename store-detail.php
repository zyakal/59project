<?php
include_once 'db/db.php';

$param = [];

function sel_store_menu()
{
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/8eb4f0837a.js" crossorigin="anonymous" defer></script>
    <script src="js/store-tabs.js" defer></script>
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
                        <div>4.5</div>
                    </div>
                    <div class="store-point__heart">
                        <i class="fa-regular fa-heart"></i>
                        <div>단골 찜</div>
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
                <ul class="list">
                    <li class="is_on">
                        <a href="#tab1" class="btn">메뉴</a>
                    </li>
                    <li>
                        <a href="#tab2" class="btn">정보</a>
                    </li>
                    <li>
                        <a href="#tab3" class="btn">리뷰</a>
                    </li>
                </ul>
                <div class="cont_area">
                    <div id="tab1" class="cont">
                        <div class="store-tab__menu">
                            <div class="menu-img">
                                <img src="" alt="">
                            </div>
                            <div class="menu-info">
                                <h1>아메리카노</h1>
                                <div class="menu-info__count">
                                    한달 10회
                                </div>
                            </div>
                            <div class="menu-price">
                                20,000원
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="cont">
                        Tab Content2
                    </div>
                    <div id="tab3" class="cont">
                        Tab Content3
                    </div>
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