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
            <a href="search.php">
                <div id="top">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Search</span>
                    <i class="fa-solid fa-sliders"></i>
                </div>
            </a>
            <?php
            include_once "main-banner.php";
            ?>
            <div class="home__categories">
                <?php
                    include_once "categories.php";
                ?>
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
    </div>
    <script src="js/slideShow.js"></script>
</body>

</html>