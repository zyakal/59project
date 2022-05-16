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
                        <div class="tabs__content__box">
                            <div class="menu-list">
                                <div class="menu-info">
                                    <img src="https://images.unsplash.com/photo-1632789395770-20e6f63be806?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=839&q=80" alt="">
                                    <div class="menu-text">
                                        <h2 class="menu-info__name">기본버거</h2>
                                        <div class="menu-info__count">한달 10회</div>
                                    </div>
                                </div>
                                <h2>20,000원</h2>
                            </div>
                        </div>
                    </div>
                    <div class="tabs__content">
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">가게소개</h2>
                            <p class="tabs__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora natus voluptas, molestias voluptates consequuntur quibusdam aspernatur expedita tempore libero excepturi obcaecati earum minus omnis adipisci fuga officia, autem, perferendis voluptatibus!</p>
                        </div>
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">영업정보</h2>
                            <table>
                                <tr>
                                    <td>상호병</td>
                                    <td>그린카페</td>
                                </tr>
                                <tr>
                                    <td>운영시간</td>
                                    <td>평일,토요일 - 오후 1:00 ~ 10:00 </td>
                                </tr>
                                <tr>
                                    <td>휴무일</td>
                                    <td>매주 월요일</td>
                                </tr>
                                <tr>
                                    <td>전화번호</td>
                                    <td>050-1234-1234</td>
                                </tr>
                            </table>
                        </div>
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">안내 및 혜택</h2>
                            <p class="tabs__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora natus voluptas, molestias voluptates consequuntur quibusdam aspernatur expedita tempore libero excepturi obcaecati earum minus omnis adipisci fuga officia, autem, perferendis voluptatibus!</p>
                        </div>
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">영업정보</h2>
                            <table>
                                <tr>
                                    <td>구독수</td>
                                    <td>600+</td>
                                </tr>
                                <tr>
                                    <td>리뷰수</td>
                                    <td>200+</td>
                                </tr>
                                <tr>
                                    <td>찜</td>
                                    <td>100+</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="tabs__content">
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">사장님 공지</h2>
                            <p class="tabs__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora natus voluptas, molestias voluptates consequuntur quibusdam aspernatur expedita tempore libero excepturi obcaecati earum minus omnis adipisci fuga officia, autem, perferendis voluptatibus!</p>
                        </div>
                        <div class="tabs__content__box">
                            <div class="point--box">
                                <div class="star--box">
                                    <div class="star--point">
                                        <h1>4.5</h1>
                                    </div>
                                    <div class="stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                                <div class="stars--bg">
                                </div>
                            </div>
                        </div>
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