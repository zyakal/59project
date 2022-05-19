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
function weeks($week_value, $week_id){
    $i=0;
    $week1 = "";
    for($i=0; $i<7; $i++){
        $week1 .= "<input id='$week_id[$i]' type='checkbox' name='$week_id[$i]' value='$week_value[$i]' hidden>
        <label class='listing-card__info__week' for='$week_id[$i]'>$week_value[$i]</label>";
    }
    return $week1;
}

