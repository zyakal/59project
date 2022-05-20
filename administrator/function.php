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
function weeks($week_value, $week_id, $sales_day_arr){
    $i=0;
    $week = "";
    $weeks_style = "";
    $check ="";
    
    for($i=0; $i<7; $i++){
        
        if($sales_day_arr[$i]==$week_value[$i] ){
        $weeks_style = "active";
        $check="checked='checked'";

    }
        else {$weeks_style =""; $check=""; }
        $week .= "<input id='$week_id[$i]' type='checkbox' name='$week_id[$i]' value='$week_value[$i]' $check hidden>
        <label class='listing-card__info__week $weeks_style' for='$week_id[$i]'>$week_value[$i]</label>";
    }
    return $week;
}
