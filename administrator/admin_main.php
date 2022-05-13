<?php
    function card_top( $card_name){
        
        echo " 
            <div class='listing-card__info--top'>
            <strong class='listing-card__name'> $card_name > </strong>
                <span>
                    <button class='btn_reset' type='reset' >취소</button>
                    <button class='btn_submit' type='submit' >적용</button>
                </span>
            </div>
            <div> &nbsp </div>";
    }   
    $card_name1 = "가게이름";
    $card_name2 = "영업날짜";
    $card_name3 = "가게 이미지";
    $card_name4 = "메일";
    $card_name5 = "영업 임시중지";
    $card_name6 = "공지 한마디";
    $card_name7 = "메뉴 정보 변경";
    $card_name8 = "메뉴 소개";
    $card_name9 = "메뉴 이미지";
    $card_name10 = "쿠폰 추가";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="nanalike.css"> -->
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>  

    <div class="wrap">
        <div class="header">
            <div><img class="logo" title="logo" src="../img/logo.png"></div>
            <nav class="nav">
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
        </div>
        
        <div class="main">
            <div class="main__header">
                <h2 class="main__title"> 홍길동 사장님,<br>입금 예정금액은 210,000 원입니다.</h2>
            </div>
            <div class="main__body">
                <div class="listing-card">
                    <ul class="listing-card__list">                        
                        <li class="listing-card__item">
                            <form class="listing-card__form" action="" method="">
                                <div class="listing-card__info">
                                    <?= card_top($card_name1)?>
                                    <div>
                                        <textarea placeholder="가게를 소개하세요(DB 해당유저의 가게소개글 없으면 null)"></textarea>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                            <div class="listing-card__info">
                            <?= card_top('영업날짜')?>
                            </div>
                            </form>
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                                <div class="listing-card__info">
                                <?= card_top($card_name2)?>
                                
                                </div>
                            </form>
                        </li>
                        <li class="listing-card__item">
                            <form action="" method="">
                                <div class="listing-card__info">
                                <?= card_top($card_name3)?>
                                
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
</body>
</html>

