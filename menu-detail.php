<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
-->
<?php
include_once 'db/db_store_and_menu.php';

$page_name = "메뉴";

$menu_num = $_GET['menu_num'];
$param = [
    "menu_num" => $menu_num
];

$menu = select_one_menu($param);
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
    <script src="js/input.js" defer></script>
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
        <main class="menu--main">
            <div class="menu--header">
                <div class="custom-shape-divider-bottom-1652766301">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M598.97 114.72L0 0 0 120 1200 120 1200 0 598.97 114.72z" class="shape-fill"></path>
                    </svg>
                </div>
            </div>
            <div class="menu--img">
                <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1637&q=80" alt="">
            </div>
            <div class="menu--box">
                <form class="num--form">
                    <div class="num--box">
                        <div class="value-button .decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                        <input type="number" class="number" value="0" />
                        <div class="value-button .increase" onclick="increaseValue()" value="Increase Value">+</div>
                    </div>
                    <div class="menu--info">
                        <div class="menu--info__box">
                            <div>
                                <h2 class="menu--price"><?= $menu['price'] ?></h2>
                            </div>
                            <div>
                                <h1><?= $menu['menu_nm'] ?></h1>
                                <h1 class="menu--sub__price">
                                    <?= $menu['subed_price'] ?>원
                                </h1>
                            </div>
                        </div>
                        <p class="sub-count">월<?= $menu['subed_count'] ?>회</p>
                        <div class="menu--content">
                            <?= $menu['menu_intro'] ?>
                        </div>
                    </div>
                    <div class="bottom--box">
                        <input class="input--sub" type="submit" value="장바구니 담기">
                    </div>
                </form>
            </div>
        </main>
        <!-- footer 인클루드해서 사용 -->
    </div>
</body>

</html>