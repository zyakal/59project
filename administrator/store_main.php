<?php
    include_once "../db/db_store.php";    
    include_once "function.php";
    include_once "../check_reserve_for_store.php";
    session_start();
   
    $login = $_SESSION['login_store'];
    if(!isset($login)){
        header("location: store_login.php");
    }
    $login_email = $login['store_email'];
    $store_num = $login['store_num'];
    
    $param = [ "store_num" => $store_num];
    

    $result = login_store($login);
    
    $store_name = $result['store_nm'];
    $store_info = $result['store_info'];   
    $store_sales_day = $result['sales_day'];
    $sales_time = $result['sales_time'];
    $store_notice = $result['store_notice'];

    //메인 페이지 카드별 이름 설정

    $card_name1 = $store_name . " 가게 소개";
    $card_name2 = "영업 요일";
    $card_name3 = "가게 이미지";
    $card_name4 = "영업시간";
    $card_name5 = "영업 임시휴일";
    $card_name6 = "공지 한마디";
    $card_name7 = "메뉴 등록";
    $card_name8 = "메뉴 편집";
    $card_name10 = "쿠폰 추가";

    

   //for문 돌리기위해 배열값 넣어줌
    
    $week_value = [
        "월",
        "화",
        "수",
        "목",
        "금",
        "토",
        "일"
    ];
    $week_id = [
        "mon",
        "tue",
        "wed",
        "thu",
        "fri",
        "sat",
        "sun"
    ];
    $menu_cate = [
        "한식",
        "분식",
        "패스트푸드",
        "도시락",
        "중식",
        "양식",
        "일식",
        "커피/디저트",
        "네일샵",
        "헤어샵",
        "취미",
        "운동"
    ];
    $menu_count_cd = [
        "회",
        "개"
    ];

    

    $sales_day_arr = explode(" ",$store_sales_day);
    $sales_time_arr = explode(",",$sales_time);
    
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="store.css">
    <title>사업자 메인 페이지</title>
</head>
<body>  

    <div class="wrap"> 
        <div class="header">
            <div><img class="logo" title="logo" src="../img/logo.png"></div>
            <nav class="nav" >
                <div class="nav__wrap">
                    <div class="nav__container">
                        <strong class="nav__title">가게</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href=""  class="nav__link">전체현황</a>
                            </div>
                            <div class="nav__item">
                                <a href="#store_notice" class="nav__link">공지 한마디</a>
                            </div>
                            <div class="nav__item">
                                <a href="#store_info"  class="nav__link">가게 소개</a>
                            </div>   
                            
                            <div class="nav__item">
                                <a href="#store_img"  class="nav__link">가게 이미지</a>
                            </div>                            
                        </div>
                    </div>

                    <div class="nav__container">
                        <strong class="nav__title">영업</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href="#store_week"  class="nav__link">영업 요일</a>
                            </div>
                            <div class="nav__item">
                                <a href="#store_time"  class="nav__link">영업 시간</a>
                            </div>
                            <div class="nav__item">
                                <a href="#store_dayOff"  class="nav__link">임시 휴일</a>
                            </div>                           
                        </div>
                    </div>

                    <div class="nav__container">
                        <strong class="nav__title">메뉴</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href="#store_menu_input"  class="nav__link">메뉴 등록</a>
                            </div>
                            <div class="nav__item">
                                <a href="#store_menu_edit"  class="nav__link">메뉴 편집</a>
                            </div>                           
                        </div>
                    </div>
                    <div class="nav__container">
                        <strong class="nav__title">혜택</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href=""  class="nav__link">쿠폰내역</a>
                            </div>                                        
                        </div>
                    </div>
                    <div class="nav__container">
                        <strong class="nav__title">주문정산</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href=""  class="nav__link">주문내역</a>
                            </div>                                        
                            <div class="nav__item">
                                <a href=""  class="nav__link">정산내역</a>
                            </div>                                        
                        </div>
                    </div>


                </div>
            </nav>
            
            <?php if(isset($login_email)){ ?>
                <div class="store_login"> <a href="store_logout.php">로그아웃</a></div>
            <?php ; } else { ?>
            
                <div class="store_login"> <a href="store_login.php">로그인</a></div>
            <?php ; } ?>
            
        </div>
        
        <div class="main">
            <div class="main__header">
                <h2 class="main__title"> <?=$store_name?> 사장님,<br>입금 예정금액은 210,000 원입니다.</h2>
                
            </div>
            
            <div class="main__body">
                <div class="listing-card">
                    <ul class="listing-card__list">     
                        <!-- 공지 -->
                        <li id = "store_notice" class="listing-card__item"> 
                            <form action="store_main_notice.php" method="post">
                            <div class="listing-card__info">
                            
                            <?= card_top($card_name6)?>
                            <div>
                                <textarea name="store_notice" placeholder="공지사항을 입력하세요"><?=$store_notice?></textarea>
                            </div>
                            
                            </div>
                            </form>
                        </li> 
                        <!-- 가게 소개 -->
                        <li id = "store_info" class="listing-card__item">
                            <form class="listing-card__form" action="store_main_intro.php" method="post">
                                <div class="listing-card__info">
                                    <?= card_top($card_name1)?>
                                    <div>
                                        <textarea name="store_intro" placeholder="가게를 소개하세요"><?=$store_info?></textarea>
                                    </div>
                                </div>
                            </form>
                        </li> 
                        <!-- 가게 이미지 -->
                        <li id = "store_img" class="listing-card__item">                        
                            <form class="img_test" action="store_photo.php" method="post" enctype="multipart/form-data">
                                <div class="listing-card__info">
                                <?= card_top($card_name3)?>
                                <div class="image-input">
                                <div class="image-input__input-wrapper" id="inputWrapper"><label><input type="file" id="imageInput"  name="img" accept="image/*"></label></div>
                                <div class="image-input__pseudo">
                                <div><i class="fa-solid fa-plus"></i></div>
                                <div>이미지 넣기</div>
                                </div>
                                <?php  
                                    $session_img = $_SESSION["login_store"]["store_photo"];
                                    $store_img = $session_img == null ? "https://cdn.pixabay.com/photo/2020/04/17/19/48/city-5056657_960_720.png" : "../img/store/" . $store_name . "/Main_img/" . $session_img;
                                ?>
                                <div class="store__img">                                    
                                    <img src="<?=$store_img?>">
                                </div>
                                </div>
                           
                                </div>
                            </form>
                            
                        </li>
                        <!-- 영업 요일 -->
                        <li id = "store_week" class="listing-card__item"> 
                            <!-- 실수로 수정하지 않도록 수정 버튼을 삽입 후 클릭하였을때만 수정되도록 구현 필요-->
                            <form action="sales_day_proc.php" method="post">
                                
                                <div class="listing-card__info">
                                <?= card_top($card_name2)?>                                
                                </div>
                                
                                <div class="listing-card__ctnt" name="sale_day">                                  
                                <?=weeks($week_value, $week_id, $sales_day_arr)?>                                    
                                </div>
                                
                            </form>
                        </li>
                        
                        <!-- 영업 시간 -->
                        <li id = "store_time" class="listing-card__item">
                            <form action="store_main_sales_time.php" method="post">
                            <div class="listing-card__info">
                            <?= card_top($card_name4)?>
                            
                                <div>
                                    <h3>오픈 시간 <?=$sales_time_arr[0]?></h3>
                                    <?= sales_time_open_hour()?>
                                    <?= sales_time_open_minute()?> 
                                </div>                            
                                <div>
                                    <h3>마감 시간 <?=$sales_time_arr[1]?></h3>
                                    <?= sales_time_close_hour()?>
                                    <?= sales_time_close_minute()?> 
                                </div>
                            
                            
                            </div>
                            </form>
                        </li>
                        
                        
                        <!-- 메뉴 등록 -->
                        <li id = "" class="listing-card__item">
                            <form action="store_menu_input.php" method="post" enctype="multipart/form-data">
                            <div class="listing-card__info">
                            <?= card_top($card_name7)?>
                            <div>메뉴 카테고리</div>
                            <div><?=menu_category($menu_cate)?></div>
                            <div>메뉴명</div>
                                <div><input type="text" name="menu_nm" placeholder="메뉴명을 입력하세요" id="">
                            </div>
                            <div>메뉴 소개</div>
                                <div><textarea name="menu_intro" id="" cols="30" rows="10" placeholder="메뉴를 소개하세요"></textarea>
                            </div>
                            <div class="store_img_input"> 메뉴 이미지</div>
                                <div><label class="">
                                    <input class="" type="file" name="menu_img" accept="image/*" >
                                </label>
                            </div>
                            <div>메뉴 정가</div>
                            <div><input type="number" name="price" id="" step="500" placeholder="구독할인전 가격" ></div>
                            <div>구독 할인가</div>
                            <div><input type="number" name="sub_price" id="" step="500" placeholder="구독할인 가격"></div>
                            <div>월 총 횟수</div>
                            <div><?=sales_count()?><?=menu_count_cd($menu_count_cd)?></div>
                            
                            </div>
                            </form>
                        </li>
                        <!-- 메뉴 편집 -->
                        <li id = "store_menu_edit" class="listing-card__item">
                            <form action="" method="get">
                            <div class="listing-card__info">
                            <div class='listing-card__info--top'>
                                <strong class='listing-card__name'> <?=$card_name8?> > </strong>
                                    
                            </div>
                            <?php 
                            $row = menu_edit($param);
                            foreach($row as $item) {
                                $menu_num = $item['menu_num'];
                                $menu_cate = $item['menu_cate'];
                                $menu_nm = $item['menu_nm'];
                                $price = $item['price'];
                                $subed_price = $item['subed_price'];
                                $subed_count = $item['subed_count'];
                                $cd_unit = $item['cd_unit'];
                                $menu_intro = $item['menu_intro'];
                                $menu_photo = $item['menu_photo'];

                                echo "$menu_num $menu_cate $menu_nm $price $subed_price $subed_count $cd_unit $menu_intro $menu_photo<br>";

                            }
                            ?>
                            <div> &nbsp </div>
                            
                            </div>  
                          </form>
                          </li>
                          


                    </ul>
                </div>
            </div>


        </div>
    </div>
    
    <script src="store.js"></script>
    <script src="../image-input/image-input.js"></script>
</body>
</html>

