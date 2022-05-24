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
    <style>
       
    </style>
</head>

<body>
    <div class="container">
        <header>
            <nav class="header--nav">
                <div class="nav--logo">
                    <a href="home.php" class="nav--back">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="nav--addr">
                    <a href="#">
                        <i class="fa-solid fa-location-dot"></i>
                        송현동
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                </div>
                <div class="nav--notice">
                    <a href="#">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </div>
            </nav>
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
                        <h2 class="tabs__title">모두 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, voluptates nihil reprehenderit architecto deleniti a blanditiis dolore voluptate cupiditate saepe sequi, quo iusto tempora itaque excepturi! Sunt optio nihil minus?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">네일 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora natus voluptas, molestias voluptates consequuntur quibusdam aspernatur expedita tempore libero excepturi obcaecati earum minus omnis adipisci fuga officia, autem, perferendis voluptatibus!</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">도시락 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">분식 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">양식 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">운동 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">일식 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">중식 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">취미 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">커피,디저트 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">패스트푸드 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">한식 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
                    </div>
                    <div class="tabs__content">
                        <h2 class="tabs__title">헤어샵 Title</h2>
                        <p class="tabs__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia quasi commodi nisi ex nostrum, aspernatur dicta perferendis deserunt reiciendis a delectus molestias eius porro, tempore molestiae ipsam sit quam aut officia, autem, perferendis?</p>
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
                }
            }

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', () => {
                    contents.forEach((content) => {
                        content.classList.remove('is-active');
                    });
                    tabs.forEach((tab) => {
                        tab.classList.remove('is-active');
                    });
                    cateNm[index].checked = true;
                    contents[index].classList.add('is-active');
                    tabs[index].classList.add('is-active');
                });
            });
        </script>
    </div>
</body>

</html>