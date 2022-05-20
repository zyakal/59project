<?php
include_once 'db/db_review.php';

$param = [
  'star_rating' => $_POST['star'],
  'ctnt' => $_POST['review_ctnt']
];

print_r($param);
