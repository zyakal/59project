<?php

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
                    <span class="home__main__top">Search</span>
                    <i class="fa-solid fa-sliders"></i>
                </div>
            </a>
            <?php
            include_once "main-banner.php";
            ?>
            <div class="home__categories">
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/Korean_Food.png"></div>
                        <div class="category__name">한식</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/bunsik.png"></div>
                        <div class="category__name">분식</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/hamburger.png"></div>
                        <div class="category__name">패스트푸드</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/lunches.png"></div>
                        <div class="category__name">도시락</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/Chinese_Food.png"></div>
                        <div class="category__name">중식</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/American_Food.png"></div>
                        <div class="category__name">양식</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/Japanese_Food.png"></div>
                        <div class="category__name">일식</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/dessert.png"></div>
                        <div class="category__name">커피,디저트</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/nail.png"></div>
                        <div class="category__name">네일샵</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/hair.png"></div>
                        <div class="category__name">헤어샵</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/hobby.png"></div>
                        <div class="category__name">취미</div>
                    </a>
                </div>
                <div class="category">
                    <a href="list.php">
                        <div class="category__img"><img src="img/banner_icon/yoga.png"></div>
                        <div class="category__name">운동</div>
                    </a>
                </div>
            </div>
            <div class="recommend">
                <div class="recommend--nav">
                    <div>맞춤 알림</div>
                    <div class="recommend--nav" id="nav--right">모두보기</div>
                </div>
                <?php
                require_once("recommend.php");
                $re = new Recommend();
                //만약 별점이 null인경우 3점으로 수정 후 계산하도록 하기!
                $subs = array(
                    "1" => array("쿠팡" => null, "베라" => 3.5, "술" => null),
                    "5" => array("베라" =>null, "파바" => 3.0),
                    "13" => array("술" => null),
                    "20" => array("쿠팡" => 4.0, "술" => 2)
                );
                $result = $re->getRecommendations($subs, "13")
                ?>
                <div class="recommend--list">
                    <?php
                    $arr = array_keys($result);
                    for($i=0; $i <count($arr); $i++) {
                        print "$arr[$i]<br>";
                    }
                    ?>
                </div>
            </div>
            <div
                id="kakao-talk-channel-chat-button"
                data-channel-public-id="_kxastb"
                data-title="consult"
                data-size="small"
                data-color="yellow"
                data-shape="pc"
                data-support-multiple-densities="true"
                class="home__main__kakao"
                ></div>
        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
    </div>
    <script src="js/slideShow.js"></script>
</body>
<script>
  window.kakaoAsyncInit = function() {
    Kakao.Channel.createChatButton({
      container: '#kakao-talk-channel-chat-button',
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://developers.kakao.com/sdk/js/kakao.channel.min.js';
    fjs.parentNode.insertBefore(js, fjs);
  })(document, 'script', 'kakao-js-sdk');
</script>
</html>