<?php
include_once "db/db.php";
$con = get_conn();
$sql = "SELECT user_num, store_num FROM t_sub";
$result = mysqli_query($con, $sql);


?>
<!-- 은지 - Home -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>59 - HOME</title>
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <header class="home--header">
            <?php
            include_once "main-header.html";
            ?>
        </header>
        <main class="home--main">
            <div id="top">
                <a href="search.php">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Search</span>
                    <i class="fa-solid fa-sliders"></i>
                </a>
            </div>
            <div class="slide_box">
                <div class="slide_list">
                    <div class="slide_item">
                        <img src="../img/가죽공예.jpg">
                    </div>
                    <div class="slide_item">
                        <img src="../img/네일샵.jpg">
                    </div>
                    <div class="slide_item">
                        <img src="../img/도넛.jpg">
                    </div>
                    <div class="slide_item">
                        <img src="../img/미용실.jpg">
                    </div>
                    <div class="slide_item">
                        <img src="../img/카페.jpg">
                    </div>
                </div>
                <div class="slide_btn_box">
                    <button class="button1">1</button>
                    <button class="button2">2</button>
                    <button class="button3">3</button>
                    <button class="button4">4</button>
                    <button class="button5">5</button>
                </div>
            </div>
            <div class="categories">
                <div class="category">
                    <a href="list.php">
                        <img src="../img/hamburger.png">
                        <div>food</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <img src="../img/coffee.png">
                        <div>카페</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <img src="../img/도넛.png">
                        <div>디저트</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <img src="../img/nail.png">
                        <div>네일</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <img src="../img/hair.png">
                        <div>미용실</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <img src="../img/hobby.png">
                        <div>취미</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <img src="../img/yoga.png">
                        <div>운동</div>
                    </a>
                </div>
            </div>
            <div class="recommend">
                <div class="recommend--nav">
                    <div>맞춤 알림</div>
                    <div class="recommend--nav" id="nav--right">모두보기</div>
                </div>
                <div class="recommend--list">
                    <div>가게이미지</div>
                    <div>가게이름</div>
                </div>
                <div class="recommend--list">
                    <div>가게이미지</div>
                    <div>가게이름</div>
                </div>

                <?php
                require_once("recommend.php");
                $re = new Recommend();

                ?>
            </div>
        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
        <script>
            var num = 24.375;
            document.querySelector('.button2').addEventListener('click', function() {
                document.querySelector('.slide_list').style.transform = `translate(-${num}rem)`;
            })
            document.querySelector('.button3').addEventListener('click', function() {
                document.querySelector('.slide_list').style.transform = `translate(-${num*2}rem)`;
            })
            document.querySelector('.button4').addEventListener('click', function() {
                document.querySelector('.slide_list').style.transform = `translate(-${num*3}rem)`;
            })
            document.querySelector('.button5').addEventListener('click', function() {
                document.querySelector('.slide_list').style.transform = `translate(-${num*4}rem)`;
            })
        </script>
    </div>
</body>

</html>