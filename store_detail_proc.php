<?php
include_once 'db/db_store_and_menu.php';

$store_num = $_GET['store_num'];
$user_num = $_GET['user_num'];
$store_like = $_GET['store_like'];

$param = [
  'store_num' => $store_num,
  'user_num' => $user_num,
  'store_like' => $store_like
];

print json_encode($param);


if ($store_like !== "0") { //이미 좋아요를 누른 경우 기존 좋아요 삭제

  // 내역 삭제
  $del_result = del_store_like($param);

  echo "<i class='far fa-heart'></i> "; // 빈 하트
  print "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam error sunt nam consequatur animi quo commodi atque laborum nesciunt culpa?";
} else {

  // 내역 생성
  $ins_result = ins_store_like($param);

  echo "<i class='fas fa-heart'></i> "; // 꽉찬 하트
}
