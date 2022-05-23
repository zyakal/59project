<?php
    include_once "db/db_list.php";

    $result = sel_store_list();


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
                <?php
                    while($row = mysqli_fetch_assoc($result)) { 
                        $param = [
                            'store_num' => $row['store_num']
                        ];
                        //$cate_nm = cate_name($param)['cate_nm'];
                        ?>
                        <!-- <div>$cate_nm?></div> -->
                        <?php
                        //$star = store_star($param);
                        include_once "store_list_form.php";
                    } ?>
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