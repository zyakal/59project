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





