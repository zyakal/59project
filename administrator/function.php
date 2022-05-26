<?php

function card_top( $card_name){
        
    echo " 
        <div class='listing-card__info--top'>
        <strong class='listing-card__name'> $card_name > </strong>
            <span>
                <button class='btn' type='reset' >취소</button>
                <button class='btn' type='submit' >등록</button>
            </span>
        </div>
        <div> &nbsp </div>";
}   
function weeks($week_value, $week_id, $sales_day_arr){
    $i=0;
    $week = "";
    $weeks_style = "";
    $check ="";
    
    for($i=0; $i<7; $i++){
        
        if($sales_day_arr[$i]==$week_value[$i] ){
        $weeks_style = " active";
        $check="checked='checked'";

    }
        else {$weeks_style =""; $check=""; }
        $week .= "<input id='$week_id[$i]' type='checkbox' name='$week_id[$i]' value='$week_value[$i]' $check hidden>
        <label class='listing-card__info__week$weeks_style' for='$week_id[$i]'>$week_value[$i]</label>";
    }
    return $week;
}

function sales_time_open_hour(){
    $hour = "";
    $i=0;
    $hour .= "<select name='sales_open_hour'><option value=''>--- 시간 ---</option>";
    for($i;$i < 24;$i++){
        if($i < 10){
            $hour .= "<option value='0$i:'>0$i 시</option>";
        }
        else {
            $hour .= "<option value='$i:'>$i 시</option>";
        }
        
    }
    $hour .= "</select>";
    return $hour;
}

function sales_time_open_minute(){
    $minute = "";
    $i=0;
    $minute .= "<select name='sales_open_minute'><option value=''>--- 분 ---</option>";
    for($i;$i < 60;$i+=10){
        if($i < 10){
            $minute .= "<option value='0$i'>0$i 분</option>";
        }
        else {
            $minute .= "<option value='$i'>$i 분</option>";
        }
        
    }
    $minute .= "</select>";
    return $minute;
}

function sales_time_close_hour(){
    $hour = "";
    $i=0;
    $hour .= "<select name='sales_close_hour'><option value=''>--- 시간 ---</option>";
    for($i;$i < 24;$i++){
        if($i < 10){
            $hour .= "<option value='0$i:'>0$i 시</option>";
        }
        else {
            $hour .= "<option value='$i:'>$i 시</option>";
        }
        
    }
    $hour .= "</select>";
    return $hour;
}

function sales_time_close_minute(){
    $minute = "";
    $i=0;
    $minute .= "<select name='sales_close_minute'><option value=''>--- 분 ---</option>";
    for($i;$i < 60;$i+=10){
        if($i < 10){
            $minute .= "<option value='0$i'>0$i 분</option>";
        }
        else {
            $minute .= "<option value='$i'>$i 분</option>";
        }
        
    }
    $minute .= "</select>";
    return $minute;
}

function menu_category($menu_cate){
    $menu_category = "";
    $i=0;
    $menu_category .= "<select name='menu_category'><option value=''>-- 카테고리 --</option>";
    for($i;$i < count($menu_cate);$i++){        
            $menu_category .= "<option value='$menu_cate[$i]'>$menu_cate[$i]</option>";
        }     
    
    $menu_category .= "</select>";
    return $menu_category;
}

function sales_count(){
    $count = "";
    $i=1;
    $count .= "<select name='sales_count'><option value=''>-- 구독 이용 --</option>";
    for($i;$i <= 30;$i++){        
            $count .= "<option value='$i'>$i</option>";
        }     
    
    $count .= "</select>";
    return $count;
}

function menu_count_cd($menu_count_cd){
    $menu_cd = "";
    $i=0;
    $menu_cd .= "<select name='menu_cd'><option value=''>-- 단위 --</option>";
    for($i;$i < count($menu_count_cd);$i++){ 
            $value = $i+1;       
            $menu_cd .= "<option value='$value'>$menu_count_cd[$i]</option>";
        }     
    
    $menu_cd .= "</select>";
    return $menu_cd;
}

function 로그인($login_email){
    if(isset($login_email)){
    echo "<div class='store_login'> <a href='store_logout.php'>로그아웃</a></div>"; } 
    else {  
    echo "<div class='store_login'> <a href='store_login.php'>로그인</a></div>"; }
} 

function 상단문구($store_name){
    echo "<div class='col-9'>
            <div class='main__header'>
                <h2 class='main__title'> $store_name 사장님,<br>입금 예정금액은 210,000 원입니다.</h2>
            </div>
        </div>";
}

function 공지($card_name6,$store_notice) {
    echo "<form action='store_main_notice.php' method='post'>
    <div class='listing-card__info'>";
    card_top($card_name6);
    echo "<div>
    <textarea name='store_notice' placeholder='공지사항을 입력하세요'> $store_notice";
    echo "</textarea>
    </div>
    
    </div>
    </form>"
    ;
}