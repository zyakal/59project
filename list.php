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
            <div class="list__main__top">
                <?php
                    include_once "categories.php";
                ?>
                <div class="top__nav">
                    <div>햄버거</div>
                    <div id="nav__right">주변가게보기</div>
                </div>
            </div>
            <div class="list__main__list">
                <?php
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="list__item">
                        <div class="list__store__img"><img src="img/store/<?=$row['store_nm']?>/Main_img/<?=$row['store_photo']?>"></div>
                        <div class="list__store__info">
                            <div class="store__info__nm"><?=$row['store_nm']?></div>
                            <div class="store__info__info">가게 정보</div>
                            <div class="store__info__star_rating"><i class="fa-solid fa-star"></i>가게 별점</div>
                        </div>
                        <div class="list__store__location"><i class="fa-solid fa-location-dot"></i> 1.0 KM</div>
                    </div>
                <?php } ?>
        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
    </div>
</body>
</html>