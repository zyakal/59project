<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>59 - Search</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="search--top">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="가게나 메뉴로 검색해보세요">
            </div>
        </header>
        <main class="search--main">
            <div class="main--selectTop">
                <div class="selectTop--nav">인기검색어</div>
                <div class="selectTop--list">
                    <div class="selectTop--item">1</div>
                    <div class="selectTop--item">2</div>
                    <div class="selectTop--item">3</div>
                    <div class="selectTop--item">4</div>
                    <div class="selectTop--item">5</div>
                    <div class="selectTop--item">6</div>
                    <div class="selectTop--item">7</div>
                    <div class="selectTop--item">8</div>
                    <div class="selectTop--item">9</div>
                    <div class="selectTop--item">10</div>
                </div>
            </div>
            <div class="search--slide">
            <?php
            include_once "main-banner.php";
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