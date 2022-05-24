<?php
    include_once "db/db_list.php";
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/screens/store_list.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js" defer></script>
    <script src="js/swiper.js" defer></script>
    <script src="js/store-tabs.js" defer></script>
    <title>59 - list</title>
</head>
<body>
    <div class="container">
        <header>
            <nav class="header--nav">
                <div class="nav--logo">
                <a href="home.php" class="nav--back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a> 
                </div>
                <div class="nav--addr">
                    <a href="#">
                        <i class="fa-solid fa-location-dot"></i>
                        송현동
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                </div>
                <div class="nav--notice">
                    <a href="#">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </div>
            </nav>
        </header>
        <main class="list__main">
            <div class="list__main__top mySwiper">
                <?php
                    include_once "categories.php";
                ?>
                <div class="top__nav">
                    <div id="nav__right">주변가게보기</div>
                </div>
            </div>
            <div class="list__main__list">
                <div class="tabs__body">
                    <div class="tabs__content" id="네일샵">
                        <h2 class="tabs__title">First Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, voluptates nihil reprehenderit architecto deleniti a blanditiis dolore voluptate cupiditate saepe sequi, quo iusto tempora itaque excepturi! Sunt optio nihil minus?</p>
                    </div>
                    <div class="tabs__content" id="도시락">
                        <h2 class="tabs__title">Second Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora natus voluptas, molestias voluptates consequuntur quibusdam aspernatur expedita tempore libero excepturi obcaecati earum minus omnis adipisci fuga officia, autem, perferendis voluptatibus!</p>
                    </div>
                    <div class="tabs__content" id="미용실">
                        <h2 class="tabs__title">Third Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                </div>
                <!-- <?php
                    $result = sel_store_list();
                    while($row = mysqli_fetch_assoc($result)) { 
                        $param = [
                            'store_num' => $row['store_num']
                        ];
                        $cate_nm = cate_name($param)['cate_nm'];
                        ?>
                        <div><?=$cate_nm?></div> -->
                        <!-- <?php
                        $star = store_star($param);
                        if (!$star) {
                            $star = "";
                        } else {
                            $star = $star['star'];
                        }
                        include_once "store_list_form.php";
                    } 
                    ?> -->
            </div>
        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
        <script>
            //a태그 대신 자바스크립트로 페이지 이동
            const row = document.querySelector('#nav__right');
            row.addEventListener("click", function(){
                location.href = `map.php`;
            });
        </script>
    </div>
</body>
</html>