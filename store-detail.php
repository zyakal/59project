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
            <div class="store-tabs">
                <div class="tabs__head">
                    <div class="tabs__toggle is-active">
                        <a class="tabs__name">메뉴</a>
                    </div>
                    <div class="tabs__toggle">
                        <a class="tabs__name">정보</a>
                    </div>
                    <div class="tabs__toggle">
                        <a class="tabs__name">리뷰</a>
                    </div>
                </div>
                <div class="tabs__body">
                    <div class="tabs__content is-active">
                        <h2 class="tabs__title">First Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, voluptates nihil reprehenderit architecto deleniti a blanditiis dolore voluptate cupiditate saepe sequi, quo iusto tempora itaque excepturi! Sunt optio nihil minus?</p>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, voluptates nihil reprehenderit architecto deleniti a blanditiis dolore voluptate cupiditate saepe sequi, quo iusto tempora itaque excepturi! Sunt optio nihil minus?</p>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, voluptates nihil reprehenderit architecto deleniti a blanditiis dolore voluptate cupiditate saepe sequi, quo iusto tempora itaque excepturi! Sunt optio nihil minus?</p>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, voluptates nihil reprehenderit architecto deleniti a blanditiis dolore voluptate cupiditate saepe sequi, quo iusto tempora itaque excepturi! Sunt optio nihil minus?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">Second Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora natus voluptas, molestias voluptates consequuntur quibusdam aspernatur expedita tempore libero excepturi obcaecati earum minus omnis adipisci fuga officia, autem, perferendis voluptatibus!</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">Third Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
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