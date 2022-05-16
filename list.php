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
        <main class="listmain">
            <div class="listmain--top">
                <div class="top--list">
                    <div class="top--item">
                        모두보기
                    </div>
                    <div class="top--item">
                        버거
                    </div>
                    <div class="top--item">
                        샌드위치
                    </div>
                    <div class="top--item">
                        피자
                    </div>
                    <div class="top--item">
                        샐러드
                    </div>
                    <div class="top--item">
                        죽
                    </div>
                    <div class="top--item">
                        이유식
                    </div>
                </div>
                <div class="top--nav">
                    <div>햄버거</div>
                    <div id="nav--right">주변가게보기</div>
                </div>
            </div>
            <div class="listmain--list">
                <div class="list--item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list--item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list--item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list--item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list--item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list--item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list--item">
                    <div>가게사진</div>
                    <div>그린버거</div>
                </div>
                <div class="list--item">
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