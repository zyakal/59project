<?php
include_once "db/db.php";


$param = [
    "store_num" => 1
];
// 가게정보
function sel_store_info(&$param)
{
    $store_num = $param['store_num'];

    $conn = get_conn();
    $sql = "select * from t_store where store_num={$store_num}";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return mysqli_fetch_assoc($result);
}
// 가게메뉴
function sel_store_menu(&$param)
{
    $store_num = $param['store_num'];

    $conn = get_conn();
    $sql = "select * from t_menu where store_num={$store_num}";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result;
}
$menu_info = sel_store_menu($param);

$store_info = sel_store_info($param);

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
    <script src="js/star.js" defer></script>
</head>

<body>
    <!-- 전체사이즈 -->
    <div class="container">
        <!-- header 인클루드해서 사용 -->
        <header class="store--header">
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
                <h1><?= $store_info['store_nm'] ?></h1>
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
                    <!-- -------- 가게메뉴 -------- -->
                    <div class="tabs__content is-active">
                        <div class="tabs__content__box">
                            <?php foreach ($menu_info as $menu) { ?>
                                <div class="menu-list">
                                    <div class="menu-info">
                                        <div class="menu_num" style="display: none;"><?= $menu['menu_num'] ?></div>
                                        <img src="https://images.unsplash.com/photo-1632789395770-20e6f63be806?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=839&q=80" alt="">
                                        <div class="menu-text">
                                            <h2 class="menu-info__name"><?= $menu['menu_nm'] ?></h2>
                                            <div class="menu-info__count">월 <?= $menu['subed_count'] ?>회</div>
                                        </div>
                                    </div>
                                    <h2 class="menu--price"><?= $menu['subed_price'] ?>원</h2>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- -------- 가게정보 -------- -->
                    <div class="tabs__content">
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">가게소개</h2>
                            <p class="tabs__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora natus voluptas, molestias voluptates consequuntur quibusdam aspernatur expedita tempore libero excepturi obcaecati earum minus omnis adipisci fuga officia, autem, perferendis voluptatibus!</p>
                        </div>
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">영업정보</h2>
                            <table>
                                <tr>
                                    <td>상호명</td>
                                    <td><?= $store_info['store_nm'] ?></td>
                                </tr>
                                <tr>
                                    <td>운영시간</td>
                                    <td><?= $store_info['sales_day'] ?> - <?= $store_info['sales_time'] ?> </td>
                                </tr>
                                <tr>
                                    <td>휴무일</td>
                                    <td>매주 월요일</td>
                                </tr>
                                <tr>
                                    <td>전화번호</td>
                                    <td><?= $store_info['store_ph'] ?></td>
                                </tr>
                                <tr>
                                    <td>사업자번호</td>
                                    <td><?= $store_info['business_num'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">가게통계</h2>
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
                    <!-- -------- 가게리뷰 -------- -->
                    <div class="tabs__content">
                        <div class="tabs__content__box">
                            <h2 class="tabs__title">사장님 공지</h2>
                            <p class="tabs__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora natus voluptas, molestias voluptates consequuntur quibusdam aspernatur expedita tempore libero excepturi obcaecati earum minus omnis adipisci fuga officia, autem, perferendis voluptatibus!</p>
                        </div>
                        <div class="tabs__content__box">
                            <div class="point--box">
                                <div class="star--box store--rating">
                                    <div class="form-group">
                                        <h1 class="ratingPoint">3.7</h1>
                                    </div>
                                    <div class="star">
                                        <div class="stars-outer">
                                            <div class="stars-inner shop--rating"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="point--graph">
                                    <div class="gray-star">
                                        <ul class="star-list-gray">
                                            <li>
                                                5점
                                            </li>
                                            <li>
                                                <div class="bar">
                                                    <div class="fill five"></div>
                                                </div>
                                            </li>
                                            <li>(2940)</li>
                                        </ul>
                                        <ul class="star-list-gray">
                                            <li>
                                                4점
                                            </li>

                                            <li>
                                                <div class="bar">
                                                    <div class="fill four"></div>
                                                </div>
                                            </li>
                                            <li>(230)</li>
                                        </ul>
                                        <ul class="star-list-gray">
                                            3점
                                            <li>
                                                <div class="bar">
                                                    <div class="fill three"></div>
                                                </div>
                                            </li>
                                            <li>(50)</li>
                                        </ul>
                                        <ul class="star-list-gray">
                                            2점
                                            <li>
                                                <div class="bar">
                                                    <div class="fill two"></div>
                                                </div>
                                            </li>
                                            <li>(5)</li>
                                        </ul>
                                        <ul class="star-list-gray">
                                            1점
                                            <li>
                                                <div class="bar">
                                                    <div class="fill one"></div>
                                                </div>
                                            </li>
                                            <li>(7)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs__content__box">
                            <div class="review--content">
                                <div class="review--header">
                                    <h2>닉네임</h2>
                                    <div class="star--box">
                                        <div class="star">
                                            <div class="stars-outer">
                                                <div class="stars-inner star5"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="review--image">
                                    <img src="" alt="">
                                </div>
                                <div class="review--comment">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos temporibus, iure eligendi asperiores laudantium iste itaque animi tenetur, obcaecati explicabo, ducimus perspiciatis facere veritatis enim minus ratione natus sapiente nemo!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- footer 인클루드해서 사용 -->
        <!-- <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer> -->
    </div>
    <script>
        // 리스트 클릭해도 페이지이동
        const rows = document.querySelectorAll(".menu-list");

        for (const row of rows) {
            const menu = row.querySelector(".menu_num").innerHTML;

            function handleRowClick() {
                location.href = `menu-detail.php?menu_num=${menu}`;
            }
            row.addEventListener("click", handleRowClick);
        }
    </script>
</body>

</html>