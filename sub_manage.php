<?php


    $user_num = 1; //세션 로그인정보 받기
    $param = [
        "user_num" => $user_num
    ];
    include_once('db/db_sub.php');
    $result = search_sub_for_user($param);
    $list = [];
    foreach($result as $item) {
        array_push($list, $item);
    }
    mysqli_free_result($result);
    $list_json = json_encode($list); 

    $now_res_list = [];
    $result = search_now_reservation_for_user($param);
    foreach($result as $item) {
        if($item['cd_sub_status']!=9) {
            array_push($now_res_list, $item);
        }
    }
    print_r($now_res_list);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/screens/sub_manage.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <title>sub_manage</title>
</head>
<body>
    <div>
        <label for="sub_list"><input type="radio" name="manage_tab" id="sub_list" onclick="getSubList()" checked >구독 리스트</label>
        <label for="total_save"><input type="radio" name="manage_tab" id="total_save" onclick="getTotalSave()" >총 할인금액</label>
    </div>
    <div class="total-save-price__container">
        <div class="month-save-price__container"></div>
        <div><canvas id="bar-chart" width="300" height="230"></canvas></div>
    </div>
    <div class="sub-list__container"> </div>
    <div class="reserved-sub"></div>
    <form action="reservation.php" method="post" id="info_form">
        <input type="hidden" id="store_num" name="store_num">
        <input type="hidden" id="sub_num" name="sub_num">
        <input type="hidden" id = "menu_num"name="menu_num">
        <input type="hidden" id = "remaining_count" name="remaining_count">
    </form>

    <script>
        const list = JSON.parse('<?=$list_json?>');
    </script>
    <script src="./js/sub_manage.mjs"></script>
           
       
   
  </body>
</html>

</body>
</html>


