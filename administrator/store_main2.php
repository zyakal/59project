<?php
    include_once "../db/db_store.php";    
    include_once "function2.php";
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

    
    // DB에서 데이터 불러오기용 문자열 자르기
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
    
    <link rel="stylesheet" href="store2.css">
    
    <title>사업자 메인 페이지</title>
</head>
<body>  
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image_bg">
                    <img class="image" src="../img/logo.png" alt="logo">
                </span>                
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#store_notice">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">공지 한마디</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#store_info">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">가게 소개</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#store_img">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">가게 이미지</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#store_week">
                            <i class='bx bx-pie-chart-alt icon'></i>
                            <span class="text nav-text">영업 요일</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#store_time">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">영업 시간</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="#store_menu_input">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">메뉴 등록</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#store_menu_edit">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">메뉴 편집</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">주문내역</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">정산내역</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">쿠폰</span>
                            
                        </a>
                    </li>
                </ul>
            </div>
            <!-- 로그아웃 버튼 -->
            <div class="bottom-content">
                
                <li class="">
                    <?= 로그아웃($login_email)?>
                    </a>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text">Dark Mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    




    <section class="container home"> 
        
    
        <!-- 상단 문구 -->
            <div class="">
            <?= 상단문구($store_name) ?>

            <div class="listing-card">
            
                <ul class="listing-card__list">
            
            
            <!-- 공지 -->
            <li class="listing-card__item">
            <?=공지($card_name6,$store_notice)?>
            </li>
            <!-- 가게 소개 -->
            <li class="listing-card__item">
            <?=가게소개($card_name1, $store_info)?>
            </li>
            <!-- 가게 이미지 -->
            <li class="listing-card__item">
            <?=가게이미지($card_name3, $store_name)?>
            </li>
                            
                    
            <!-- 영업 요일 --> 
            <li class="listing-card__item">             
            <?=영업요일($card_name2,$week_value, $week_id, $sales_day_arr)?>
            </li>
                        
            <!-- 영업 시간 -->
            <li class="listing-card__item">        
            <?=영업시간($card_name4,$sales_time_arr ) ?>
            </li>  
                        
                        
            <!-- 메뉴 등록 -->
            <li class="listing-card__item">                    
            <?=메뉴등록($card_name7, $menu_cate, $menu_count_cd)?>
            </li>
            
           
        <!-- 메뉴 편집 -->
                    
                <li class="listing-card__item">
                        
                        
                        <div id='store_menu_edit' class='listing-card__info--top'>
                            <strong class='listing-card__name'> <?=$card_name8?> > </strong>
                                
                        </div>
                        <?php 
                        
                        $row = menu_edit($param);
                        foreach($row as $item) {
                            $menu_num = $item['menu_num'];
                            $store_menu_cate = $item['menu_cate'];
                            $menu_nm = $item['menu_nm'];
                            $price = $item['price'];
                            $subed_price = $item['subed_price'];
                            $subed_count = $item['subed_count'];
                            $cd_unit = $item['cd_unit'];
                            $menu_intro = $item['menu_intro'];
                            $menu_photo = $item['menu_photo'];
                            $menu_img =  "../img/store/" . $store_name . "/Menu_img/" . $menu_photo;
                            $adr = "this.src='https://cdn.pixabay.com/photo/2015/12/22/04/00/photo-1103594_960_720.png'";
                            
                        
                            echo '<div><img class="menu_img" src="' . $menu_img . '" onerror="' . $adr . '" >';
                        
                            // $_GET[menu_detail]
                            
                            echo "$menu_nm 1달 구독 <span class='detail__icon' ><i class='fa-solid fa-bars'></i></span><br>  <div class='detail_ctnt'>
                            <form action='store_menu_edit.php' method='post'>";
                            
                            메뉴편집($menu_num, $menu_nm, $menu_intro,$price,$subed_price, $store_menu_cate,$subed_count,$cd_unit);
                            echo "</div></form>";
                            
                            
                        }
                        ?>
                        </form>
                          
                        


                        
                </li>
                </div>
        </div>
        </section>
    
    <script src="https://kit.fontawesome.com/6a1759ba21.js" crossorigin="anonymous"></script>
    <script src="store.js"></script>
    <script src="../image-input/image-input.js"></script>
</body>
</html>

