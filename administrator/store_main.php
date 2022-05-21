<?php
    include_once "../db/db_store.php";    
    include_once "function.php";
    session_start();
    $login = $_SESSION['login_store'];
    $login_email = $login['store_email'];
    

    $result = login_store($login);
    
    $store_name = $result['store_nm'];
    $store_info = $result['store_info'];   
    $store_sales_day = $result['sales_day'];

    //메인 페이지 카드별 이름 설정

    $card_name1 = $store_name . " 가게 소개";
    $card_name2 = "영업날짜";
    $card_name3 = "가게 이미지";
    $card_name4 = "영업시간";
    $card_name5 = "영업 임시중지";
    $card_name6 = "공지 한마디";
    $card_name7 = "메뉴 정보 변경";
    $card_name8 = "메뉴 소개";
    $card_name9 = "메뉴 이미지";
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


    

    $sales_day_arr = explode(" ",$store_sales_day);
    
    
  

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
                                <a href="" target="_blank" class="nav__link">전체현황</a>
                            </div>
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">가게관리</a>
                            </div>
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">영업임시중지</a>
                            </div>                            
                        </div>
                    </div>

                    <div class="nav__container">
                        <strong class="nav__title">리뷰</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">리뷰관리</a>
                            </div>
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">공지 한마디</a>
                            </div>                           
                        </div>
                    </div>

                    <div class="nav__container">
                        <strong class="nav__title">메뉴</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">메뉴판 관리</a>
                            </div>
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">메뉴관리</a>
                            </div>                           
                        </div>
                    </div>
                    <div class="nav__container">
                        <strong class="nav__title">혜택</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">쿠폰내역</a>
                            </div>                                        
                        </div>
                    </div>
                    <div class="nav__container">
                        <strong class="nav__title">주문정산</strong>
                        <div class="nav__list">                            
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">주문내역</a>
                            </div>                                        
                            <div class="nav__item">
                                <a href="" target="_blank" class="nav__link">정산내역</a>
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
                        <li class="listing-card__item">
                            <form class="listing-card__form" action="store_main_intro.php" method="post">
                                <div class="listing-card__info">
                                    <?= card_top($card_name1)?>
                                    <div>
                                        <textarea name="store_intro" placeholder="가게를 소개하세요"><?=$store_info?></textarea>
                                    </div>
                                </div>
                            </form>
                        </li>
                        
                        <li class="listing-card__item"> 
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
                        <li class="listing-card__item">                        
                            <form action="store_photo.php" method="post" enctype="multipart/form-data">
                                <div class="listing-card__info">
                                <?= card_top($card_name3)?>
                                <div><label><input type="file" name="img" accept="image/*"></label></div>
                                <?php  
                                    $session_img = $_SESSION["login_store"]["store_photo"];
                                    $store_img = $session_img == null ? "https://cdn.pixabay.com/photo/2020/04/17/19/48/city-5056657_960_720.png" : "../img/store/" . $store_name . "/Main_img/" . $session_img;
                                ?>
                                <div class="circular__img circular__size">                                    
                                    <img src="<?=$store_img?>">
                                </div>
                            </a>
                                </div>
                            </form>
                            
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                            <div class="listing-card__info">
                            <?= card_top($card_name4)?>
                            
                            </div>
                            </form>
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                            <div class="listing-card__info">
                            <?= card_top($card_name5)?>
                            
                            </div>
                            </form>
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                            <div class="listing-card__info"><strong class="listing-card__name">메뉴 편집</strong>
                            
                            </div>
                            </form>
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                            <div class="listing-card__info">
                            <?= card_top($card_name6)?>
                            
                            </div>
                            </form>
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                            <div class="listing-card__info">
                            <?= card_top($card_name7)?>
                            
                            </div>
                            </form>
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                            <div class="listing-card__info">
                            <?= card_top($card_name8)?>
                            
                            </div>  
                          </form>
                          </li>
                          <li class="listing-card__item">
                            <form action="" method="">
                            <div class="listing-card__info">
                            <?= card_top($card_name9)?>
                            
                            </div>
                          </form>
                          </li>


                    </ul>
                </div>
            </div>


        </div>
    </div>
    
    <script src="store.js"></script>
</body>
</html>

