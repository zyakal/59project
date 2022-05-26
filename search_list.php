<?php
    include_once "db/db_list.php";

    $search_txt = $_GET['search_txt'];

    $param = [
        'search_txt' => $search_txt
    ];

    $result = search_result_list($param); 
    if(empty($result)) {
        $mag = "검색 결과가 없습니다!";
    } else {
        $mag = count(mysqli_fetch_array($result)) . "개가 검색되었습니다.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/screens/store_list.css">
    <title>59 - search</title>
    <style>
        .search_list_main { padding-top: 122px; margin: 0 32px;}
    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav class="header--nav">
                <div class="nav--logo">
                    <a href="javascript:history.back();" class="nav--back">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a> 
                </div>
                <div class="nav--addr">
                    <a href="my_addr.php">
                        <i class="fa-solid fa-location-dot"></i>
                        송현동
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                </div>
                <div class="nav--notice">
                    <a href="not.php">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </div>
            </nav>
        </header>
        <main class="search_list_main">
            <div class="search__main__list">
                <div>
                    <?=$mag?>
                </div>
                <?php
                    while($row = mysqli_fetch_array($result)) {
                        $store_num = $row['store_num'];
                        if(!$row['store_num']) {
                            print "<div>검색결과 없음</div>";
                        } else {
                        $param = [
                            'store_num' => $store_num
                        ];
                        $re_store = sel_result_store($param);
                        $row = mysqli_fetch_array($re_store); 
                        $star = store_star($param);
                        if (!$star) {
                            $star = "";
                        } else {
                            $star = $star['star'];
                        }?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                            <div class="list__item">
                                <div class="list__store__img"><img src="img/store/그린네일/Main_img/9c4708ab-ca93-745d-86b7-06eea7c5e0dc.jpg"></div>
                                <div class="list__store__info">
                                    <div class="store__info__nm"><?=$row['store_nm']?></div>
                                    <div class="store__info__info">가게 정보</div>
                                    <?php 
                                    if ($star == "") { ?>
                                        <div class='store__info__star_rating'><i class='fa-solid fa-star'></i></div>
                                    <?php } else { ?>
                                        <div class='store__info__star_rating'><i class='fa-solid fa-star'><?=intval($star)?></i></div>
                                    <?php } ?>
                                </div>
                                <div class="list__store__location"><i class="fa-solid fa-location-dot"></i> 1.0 KM</div>
                            </div>
                        </a>
                       <?php } 
                    } ?>
            </div>
        </main>
    </div>
</body>
</html>