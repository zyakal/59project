<?php
include_once "db/db_list.php";

$get_cate_nm = $_GET['cate_nm'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/screens/store_list.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js" defer></script>
    <script src="js/swiper.js" defer></script>
    <title>59 - list</title>
    
</head>

<body>
    <div class="container">
        <header class="list__header">
            <?php
            include_once "list_header.php";
            ?>
        </header>
        <main class="list__main">
            <div class="list__main__top mySwiper">
                <?php
                include_once "db/db_list.php";
                $result = sel_categories();
                ?>
                <div class="top__list swiper-wrapper">
                    <div class="top__item tabs__toggle swiper-slide">
                        <input type="radio" name="tabs__name" id="모두보기" value="모두보기">
                        <label for="모두보기" class="tabs__name">모두보기</label>
                    </div>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { 
                        if($get_cate_nm == $row['cate_nm']) { ?>
                            <div class="top__item tabs__toggle swiper-slide">
                            <input type="radio" name="tabs__name" id="<?= $row['cate_nm'] ?>" value="<?= $row['cate_nm'] ?>" checked>
                            <label for="<?= $row['cate_nm'] ?>" class="tabs__name"><?= $row['cate_nm'] ?></label>
                        </div>
                        <?php } else { ?>
                        <div class="top__item tabs__toggle swiper-slide">
                            <input type="radio" name="tabs__name" id="<?= $row['cate_nm'] ?>" value="<?= $row['cate_nm'] ?>">
                            <label for="<?= $row['cate_nm'] ?>" class="tabs__name"><?= $row['cate_nm'] ?></label>
                        </div>
                    <?php }} ?>
                </div>
                <div class="top__nav">
                    <div id="nav__right">주변가게보기</div>
                </div>
            </div>
            <div class="list__main__list">
                <div class="tabs__body">
                    <div class="tabs__content">
                        <?php
                            include_once "db/db_list.php";
                            $result = sel_store_list();
                           
                            while($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="tabs__item">
                                <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                    <div class="list__item">
                                        <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
                                        <div class="list__store__info">
                                            <div class="store__info__nm"><?=$row['store_nm']?></div>
                                            <div class="store__info__info">가게 정보</div>
                                            <?php 
                                            $star = store_star($param);
                                            // if (!$star) {
                                            //     $star = "";
                                            // } else {
                                            //     $star = $star['star'];
                                            // }
                                            if ($star == "") { ?>
                                                <div class='store__info__star_rating'><i class='fa-solid fa-star'></i></div>
                                            <?php } else { ?>
                                                <div class='store__info__star_rating'><i class='fa-solid fa-star'><?=intval($star)?></i></div>
                                            <?php } ?>
                                        </div>
                                        <div class="list__store__location"><i class="fa-solid fa-location-dot"></i> 1.0 KM</div>
                                    </div>
                                </a>
                            </div>
                           <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                            $cate = 9;
                            $param = [
                                'cate' => $cate
                            ];
                            $result = sel_cate_store($param);
                            while($row = mysqli_fetch_assoc($result)) { ?>
                            <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                    <div class="list__item">
                                        <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                            <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 4;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 2;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 6;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 12;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 7;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 5;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 11;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 8;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 3;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 1;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                    <div class="tabs__content">
                        <?php
                        $cate = 10;
                        $param = [
                            'cate' => $cate
                        ];
                        $result = sel_cate_store($param);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="store-detail.php?store_num=<?=$row['store_num']?>">
                                <div class="list__item">
                                    <div class="list__store__img"><img src="img/store/test_store1/Main_img/bb8122e7-3786-46d3-9258-665c77ce95b4.jpg"></div>
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
                        <?php } ?>
                    </div>
                </div>
                <!-- <?php
                        $result = sel_store_list();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $param = [
                                'store_num' => $row['store_num']
                            ];
                            $cate_nm = cate_name($param)['cate_nm'];
                        ?>
                        <div><?= $cate_nm ?></div> -->
                <!-- <?php
                            $star = store_star($param);
                            if (!$star) {
                                $star = "";
                            } else {
                                $star = $star['star'];
                            }
                            include_once "store_list_form.php";
                        }
                        ?> -->
            </div>
        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
        <script>
            //a태그 대신 자바스크립트로 페이지 이동
            const row = document.querySelector('#nav__right');
            row.addEventListener("click", function() {
                location.href = `map.php`;
            });


            let tabs = document.querySelectorAll('.tabs__toggle'),
                contents = document.querySelectorAll('.tabs__content');
 
            let cateNm = document.querySelectorAll('.tabs__name');
            
            for(let i=0; i<cateNm.length; i++){
                if(document.querySelector('input[type="radio"]:checked').value == cateNm[i].innerHTML){
                    // console.log(cateNm[i].innerHTML);
                    contents.forEach((content) => {
                        content.classList.remove('is-active');
                    });
                    tabs.forEach((tab) => {
                        tab.classList.remove('is-active');
                    });
                    tabs[i].classList.add('is-active');
                    contents[i].classList.add('is-active');
                    // console.log(tabs[i].innerHTML);
                    document.querySelector('input[type="radio"]').checked = false;
                    tabs[i].style.backgroundColor = 'var(--main-pink)';
                }
            }

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', () => {
                    contents.forEach((content) => {
                        content.classList.remove('is-active');
                    });
                    tabs.forEach((tab) => {
                        tab.classList.remove('is-active');
                        tab.style.backgroundColor = "";
                    });
                    cateNm[index].checked = true;
                    contents[index].classList.add('is-active');
                    tabs[index].classList.add('is-active');
                    tabs[index].style.backgroundColor = 'var(--main-pink)';
                });
            });
        </script>
    </div>
</body>

</html>