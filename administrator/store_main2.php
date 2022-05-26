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
    
    <link rel="stylesheet" href="store.css">
    <title>사업자 메인 페이지</title>
</head>
<body>  
<!-- 좌측 메뉴바 해당 -->
    <div class="container"> 
        <div class="row col-3"> 
            <div><img class="logo" title="logo" src="../img/logo.png"></div>
            
                
                    
                        가게
                        
                                <a href=""  class="nav__link">전체현황</a>
                            
                           
                                <a href="#store_notice" class="nav__link">공지 한마디</a>
                            
                                <a href="#store_info"  class="nav__link">가게 소개</a>
                             
                            
                            
                                <a href="#store_img"  class="nav__link">가게 이미지</a>
                                                      
                      

                    
                        영업
                        
                                <a href="#store_week"  class="nav__link">영업 요일</a>
                            
                            
                                <a href="#store_time"  class="nav__link">영업 시간</a>
                            
                            
                                <a href="#store_dayOff"  class="nav__link">임시 휴일</a>
                            
                    메뉴
                        
                                <a href="#store_menu_input"  class="nav__link">메뉴 등록</a>
                            
                                <a href="#store_menu_edit"  class="nav__link">메뉴 편집</a>
                            
                   
                        혜택
                        
                                <a href=""  class="nav__link">쿠폰내역</a>
                            
                    주문정산
                                <a href=""  class="nav__link">주문내역</a>
                            
                                <a href=""  class="nav__link">정산내역</a>
                            
        

    
           
            <!-- 로그아웃 / 로그인 -->
            
        <?= 로그인($login_email)?>
        </div>
    
        <!-- 상단 문구 -->
        
        <?= 상단문구($store_name) ?>
          
                     
        <!-- 공지 -->
        <?=공지($card_name6,$store_notice)?>
        <!-- 가게 소개 -->
        <?=가게소개($card_name1, $store_info)?>
        <!-- 가게 이미지 -->
                          
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
                                <img src="<?=$store_img?>" onerror= "this.src='https://cdn.pixabay.com/photo/2020/04/17/19/48/city-5056657_960_720.png'">
                            </div>
                            </div>
                            192.168.0.27
                            </div>
                        </form>
                        
                   
                    <!-- 영업 요일 -->
                    
                        <!-- 실수로 수정하지 않도록 수정 버튼을 삽입 후 클릭하였을때만 수정되도록 구현 필요-->
                        <form action="sales_day_proc.php" method="post">
                            
                            <div class="listing-card__info">
                            <?= card_top($card_name2)?>                                
                            </div>
                            
                            <div class="listing-card__ctnt" name="sale_day">                                  
                            <?=weeks($week_value, $week_id, $sales_day_arr)?>                                    
                            </div>
                            
                        </form>
                   
                    
                    <!-- 영업 시간 -->
                    
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
                
                    
                    
                    <!-- 메뉴 등록 -->
                    
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
                  
                    <!-- 메뉴 편집 -->
                    
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
                            $menu_img =  "../img/store/" . $store_name . "/Menu_img/" . $menu_photo;
                            
                        ?>
                            <div><img class="menu_img" src="<?=$menu_img?>"  onerror="this.src='https://cdn.pixabay.com/photo/2015/12/22/04/00/photo-1103594_960_720.png'">
                        <?php
                            // $_GET[menu_detail]
                            echo "$menu_nm 1달 구독
                            <form action='store_main?1' 'method='get'>
                                <button class='tabs__toggle' name='menu_detail' type='submit' value='$menu_num'>
                                    <i class='fa-solid fa-bars'></i>
                                </button>
                            </form>
                            </div> $subed_price <br><div class = 'tabs__content.is-active'>11111111111</div><div>";
                            
                        }
                        ?>
                            

                        
                        
                        
                        </div>  
                        </form>
                       
                        


                
                </div>
            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6a1759ba21.js" crossorigin="anonymous"></script>
    <script src="store.js"></script>
    <script src="../image-input/image-input.js"></script>
</body>
</html>

