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
            <div id="top">
                <a href="search.php">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span class="home__main__top">Search</span>
                    <i class="fa-solid fa-sliders"></i>
                </a>            
            </div>
            <?php
            include_once "main-banner.php";
            ?>
            <!-- main 카테고리 -->
            <div class="home__categories">
                <?php
                    include_once "db/db_list.php";
                    $result = sel_categories();

                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="category">
                            <a href="list.php?cate_nm=<?=$row['cate_nm']?>">
                                <div class="category__img"><img src="img/banner_icon/<?=$row['cate_nm']?>.png"></div>
                                <div class="category__name"><?=$row['cate_nm']?></div>
                            </a>
                        </div>
                    <?php } ?>
            </div>
            <!-- 맞춤 추천 부분 -->
            <div class="recommend">
                <div class="recommend--nav">
                    <?php
                    if(isset($_SESSION['login_user'])) { ?>
                    <div>맞춤 추천</div>
                    <?php } else { ?>
                        <div>거리순 추천</div>
                    <?php } ?>
                    <div class="recommend--nav" id="nav--right">모두보기</div>
                </div>
                <?php
                require_once("recommend.php");
                // session_start();
                // $login_user = $_SESSION['login_user'];
                if(isset($_SESSION['login_user'])) {
                    $user_num = $login_user['user_num'];

                    $sub = sel_sub_num();
                    while($row = mysqli_fetch_assoc($sub)) {
                        $param = [
                            'user_num' => $row['user_num'],
                            'store_num' => $row['store_num']
                        ];
                        $star = sel_reviwe_star($param);
                        $subs = array (
                            $row['user_num'] => array($row['store_num'] => $star) 
                        );
                        $re = new Recommend();
                        //만약 별점이 null인경우 3점으로 수정 후 계산하도록 하기!
                        $result = $re->getRecommendations($subs, $user_num);
                    } 
                } else {

                }
               
                ?>
                <div class="recommend--list">
                    <div class="recommend__item">
                        <h2 class="recommend__title">그린버거</h2>
                        <p class="recommend__text">Lorem ipsum dolor Sunt optio nihil minus?</p>
                    </div>
                </div>
                <div class="recommend--list">
                    <div class="recommend__item">
                        <h2 class="recommend__title">그린네일</h2>
                        <p class="recommend__text">Lorem ipsum dolor Sunt optio nihil minus?</p>
                    </div>
                </div>
                <div class="recommend--list">
                    <div class="recommend__item">
                        <h2 class="recommend__title">그린카페</h2>
                        <p class="recommend__text">Lorem ipsum dolor Sunt optio nihil minus?</p>
                    </div>
                </div>
                <div class="recommend--list">
                    <div class="recommend__item">
                        <h2 class="recommend__title">그린헤어샵</h2>
                        <p class="recommend__text">Lorem ipsum dolor Sunt optio nihil minus?</p>
                    </div>
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