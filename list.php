<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
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
            <div class="listmain__list">
                <div class="list__item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list__item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list__item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list__item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list__item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list__item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list__item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list__item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
            </div>
        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
    </div>
</body>
</html>