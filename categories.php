<?php
    include_once "db/db_list.php";
    $result = sel_categories();
?>

<div class="top__list swiper-wrapper">
    <div class="top__item swiper-slide">
        모두보기
    </div>
    <?php
        while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="top__item swiper-slide">
                <?= $row['cate_nm'] ?>
            </div>
        <?php } ?>
</div>
