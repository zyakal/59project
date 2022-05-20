<?php
include_once 'db.php';

function ins_menu_review(&$param)
{
  $conn = get_conn();
  $sql = 'INSERT INTO t_review (store_num, user_num, ctnt, star_rating) VALUES (1,10,"커피 맛있었어요", 5)';

  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);

  return mysqli_fetch_assoc($result);
}
