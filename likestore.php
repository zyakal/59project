<?php
include_once "db/db_list.php";
$page_name = "찜 가게 list";
session_start();
if (isset($_SESSION['login_user'])) {
    $login_user = $_SESSION['login_user'];
} else {
    echo "<script>
        alert('로그인 후 이용 가능합니다.');
        window.location.href = 'login.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/screens/likestore.css">
    <link rel="stylesheet" href="css/screens/store_list.css">
    <title>59 - 찜리스트</title>
</head>

<body>
    <div class="container">
        <header>
            <?php
            include_once "header.php";
            ?>
        </header>
        <main class="likestore_main">
            <?php
            $user_num = $login_user['user_num'];
            $param = [
                'user_num' => $user_num
            ];
            if (search_like($param)['cnt'] === '0') { ?>
                <div class="likestore__null">
                    <div class="likestore__null__bigfont">찜한 구독이 없어요</div>
                    <div class="likestore__null__smallfont">하트를 눌러 마음에 드는 구독을 찜해보세요.</div>
                </div>
            <?php } else { ?>
                <div class="likestore_list">
                    <?php $result = sel_like_stores($param);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?= $row['store_num'] ?>">
                            <div class="list__item">
                                <div class="list__store__img"><img src="img/store/그린네일/Main_img/9c4708ab-ca93-745d-86b7-06eea7c5e0dc.jpg"></div>
                                <div class="list__store__info">
                                    <div class="store__info__nm"><?= $row['store_nm'] ?></div>
                                    <div class="store__info__info"><?= $row['info'] ?></div>
                                    <?php
                                    $param = [
                                        'store_num' => $row['store_num']
                                    ];
                                    $star = store_star($param);
                                    if (!$star) {
                                        $star = "";
                                    } else {
                                        $star = $star['star'];
                                    }
                                    if ($star == "") { ?>
                                        <div class='store__info__star_rating'><i class='fa-solid fa-star'></i></div>
                                    <?php } else { ?>
                                        <div class='store__info__star_rating'><i class='fa-solid fa-star'><?= intval($star) ?></i></div>
                                    <?php } ?>
                                </div>
                                <div class="list__store__location"><i class="fa-solid fa-location-dot"></i> 1.0 KM</div>
                            </div>
                        </a>
                <?php }
                } ?>
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