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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sub_manage</title>
</head>
<body>
    <div>
        <label for="total_save"><input type="radio" name="manage_tab" id="total_save" onclick="getTotalSave()">총 할인금액</label>
        <label for="sub_list"><input type="radio" name="manage_tab" id="sub_list" onclick="getSubList()" >구독 리스트</label>
    </div>
    <div id="sub_manage_container2"></div>

    <script>
        let list = JSON.parse('<?=$list_json?>');
        
    </script>
    <script src="./js/sub_manage.js"></script>
    
</body>
</html>