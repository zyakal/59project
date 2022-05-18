<?php
  $store_num = 1; //스토어넘버 전페이지에서 받아와야함
  $menu_num = 1; //메뉴넘버 전페이지에서 받아와야함
  $sub_num = 1; //구독넘버 받아야함

  $openTime = "09:00";
  $closeTime = "19:00";
  $openDay = "월,화,수,목,금";
   // 영업시간 초기값
  // 휴무일반영되게 추가해야함
 

  $param = [
    "store_num" => $store_num,
    "menu_num" => $menu_num,
    "sub_num" => $sub_num
  ];
  include_once 'db/db_store_and_menu.php';
  $list_store = select_one_store($param);
  if(isset($list_store)) { 
    $openTime = explode(",", $list_store['sales_time'])[0];
    $closeTime = explode(",", $list_store['sales_time'])[1];
  }
  $list_menu = select_one_menu($param);
  if(isset($list_store)) {
    $menu_nm = $list_menu['menu_nm'];
    $menu_subed_count = $list_menu['subed_count'];
    echo $menu_nm."<br>";
    echo $menu_subed_count;
  }
 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/screens/reservation.css" />
    <title>reservation</title>
  </head>
  <body>
    <div>
      <h1>예약하기</h1>
      <table>
        <tr>
          <td>ex구독메뉴</td>
          <td>ex그린카페</td>
        </tr>
        <tr>
          <td>ex남은횟수</td>
          <td>ex 17회</td>
        </tr>
      </table>
    </div>
    <form action="reservation_proc.php" method="post">
      <div>
        <div>날짜선택</div>
        <div class="day-box"></div>
      </div>
      <div>
        <div>시간선택</div>
        <div class="time-box"></div>
      </div>
      <input type="submit" />
    </form>
    <script>
      <?= "let openTime = '$openTime';" ?>
      <?= "let closeTime = '$closeTime';" ?>
      <?= "let openDay = '$openDay';" ?>

      

    </script>
    <script src="./js/reservation_create_time_fn.js"></script>
    
  </body>
</html>
