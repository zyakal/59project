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
        <header>
            <?php
            include_once "main-header.html";
            ?>
        </header>
        <main>
            <div id="top">
                <a href="search.php">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Search</span>
                    <i class="fa-solid fa-sliders"></i>
                </a>
            </div>
            <div id="slide_wrap">
                <div class="slide_box">
                    <div class="slide_list clearfix">
                        <div class="slide_content slide01"><img src="../img/가죽공예.jpg" alt=""></div>
                        <div class="slide_content slide02"><img src="../img/네일샵.jpg" alt=""></div>
                        <div class="slide_content slide03"><img src="../img/도넛.jpg" alt=""></div>
                        <div class="slide_content slide04"><img src="../img/미용실.jpg" alt=""></div>
                        <div class="slide_content slide05"><img src="../img/카페.jpg" alt=""></div>
                    </div>
                </div>
                <div class="slide_btn_box">
                    <button type="button" class="slide_btn_prev">Prev</button>
                    <button type="button" class="slide_btn_next">Next</button>
                </div>
                <ul class="slide_pagination"></ul>
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