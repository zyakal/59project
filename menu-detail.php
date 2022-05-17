<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
-->
<?php
$page_name = "메뉴";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/8eb4f0837a.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- 전체사이즈 -->
    <div class="container">
        <!-- header 인클루드해서 사용 -->
        <header class="store--header">
            <?php
            include_once "store-header.html";
            ?>
        </header>
        <!-- main -->
        <main class="menu--main">
            <div class="menu--header">
                <div class="custom-shape-divider-bottom-1652766301">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M598.97 114.72L0 0 0 120 1200 120 1200 0 598.97 114.72z" class="shape-fill"></path>
                    </svg>
                </div>
            </div>
            <div class="menu--img">
                <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1637&q=80" alt="">
            </div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat totam, architecto nostrum minima aspernatur hic consequatur blanditiis eaque optio, error illum culpa necessitatibus, velit aperiam atque laudantium pariatur quasi ab!
        </main>
        <!-- footer 인클루드해서 사용 -->
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
    </div>
</body>

</html>