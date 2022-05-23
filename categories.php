<?php
    include_once "db/db_list.php";
    $result = sel_categories();
?>

<div class="top__list mySwiper">
    <div class="top__item swiper-wrapper">
        모두보기
    </div>
    <?php
        while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="top__item swiper-slide">
                <?=$row['cate_nm']?>
            </div>
        <?php } ?>
</div>