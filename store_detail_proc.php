<?php
include_once 'db/db_store_and_menu.php';

$store_num = $_POST['store_num'];
$user_num = $_POST['user_num'];
$store_like = $_POST['store_like'];

$param = [
  'store_num' => $store_num,
  'user_num' => $user_num
];

if ($user_num !== 0) { //회원이 아닌 경우 로그인 페이지로 이동
  $href = 'mypage.php';
  print "<script>alert('회원만 가능합니다.', $href) </script>";
}


if (!($store_num && $user_num)) {
  print "<script> alert('값이 제대로 넘어오지 않았습니다.') </script>";
  $sel_result = sel_store_like($param);
}

if ($store_like !== 0) { //이미 좋아요를 누른 경우 기존 좋아요 삭제

  // 내역 삭제
  $del_result = del_store_like($param);

  echo "<i class='far fa-heart'></i> "; // 빈 하트

} else {

  // 내역 생성
  $ins_result = ins_store_like($param);

  echo "<i class='fas fa-heart'></i> "; // 꽉찬 하트
}
