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

        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
        <script>
            var num = '24.375rem';
            document.querySelector('.button2').addEventListener('click', function() {
                document.querySelector('.slide_list').style.transform = `translate(-${num})`;
            })
            document.querySelector('.button3').addEventListener('click', function() {
                document.querySelector('.slide_list').style.transform = `translate(-${num*2})`;
            })
            document.querySelector('.button4').addEventListener('click', function() {
                document.querySelector('.slide_list').style.transform = `translate(-${num*3})`;
            })
            document.querySelector('.button5').addEventListener('click', function() {
                document.querySelector('.slide_list').style.transform = `translate(-${num*4})`;
            })
        </script>
    </div>
</body>
</html>