<?php
include_once 'db/db_review.php';

$param = [
  'store_num' => $_POST['store_num'],
  'user_num' => $_POST['user_num'],
  'star_rating' => $_POST['star'],
  'ctnt' => $_POST['review_ctnt']
];

print_r($param);
