<?php
  $store_num = $_POST['store_num'];
  $menu_num = $_POST['menu_num'];
  $sub_num = $_POST['sub_num'];
  $remaining_count = $_POST['remaining_count'];
  

  $openTime = "09:00";
  $closeTime = "19:00";
  $openDay = "월,화,수,목,금";
   // 영업시간 초기값
  // 휴무일반영되게 추가해야함.
 

  $param = [
    "store_num" => $store_num,
    "menu_num" => $menu_num,
    "sub_num" => $sub_num
  ];
  include_once 'db/db_store_and_menu.php';
  $list_store = select_one_store($param);
  $sales_time = str_replace(" ","",$list_store['sales_time']);
  if(isset($list_store)) { 
    $openTime = explode(",", $sales_time)[0];
    $closeTime = explode(",", $sales_time)[1];
  }
  $list_menu = select_one_menu($param);
  if(isset($list_menu)) {
    $menu_nm = $list_menu['menu_nm'];
    $menu_subed_count = $list_menu['subed_count'];
    
  }
  // print_r($list_menu);
  // echo "<br>";
  // print_r($list_store);
  // echo "<br>".$list_store['sales_time'];
  // echo "<br>";
  // echo "open:".$openTime."<br>";
  // echo "close:".$closeTime;
?>

<script>
  let requireTimeMin = <?= $list_menu['required_time'] ?>;
  console.log("requiredTime:"+requireTimeMin);
</script>


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
          <td>구독메뉴</td>
          <td><?=$menu_nm?></td>
        </tr>
        <tr>
          <td>남은횟수</td>
          <td><?=$remaining_count?></td>
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
