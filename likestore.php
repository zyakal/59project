<?php
    include_once "db/db_list.php";
    $page_name = "찜 가게 list";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/screens/likestore.css">
    <link rel="stylesheet" href="css/screens/store_list.css">
    <title>59 - 찜리스트</title>
</head>
<body>
    <div class="container">
        <header>
            <?php
                include_once "header.php";
            ?>
        </header>
        <main class="likestore_main">
            <div class="likestore_list">
            <?php
                $user_num = 10;
                $param = [
                    'user_num' => $user_num
                ];
                $result = sel_like_stores($param);
                while ($row = mysqli_fetch_assoc($result)) {
                    // if(isset($row['store_nm'])) {
                    //     print "있다";
                    // } else {
                    //     print "없다";
                    // }
                    if (isset($row['store_nm'])) {
                
                    include_once "store_list_form.php";
                    
                } else { ?>
                    <div class="likestore__null__bigfont">찜한 구독이 없어요</div>
                    <div class="likestore__null__smallfont">하트를 눌러 마음에 드는 구독을 찜해보세요.</div>
            <?php }
            }?>
                    
                
               
            </div>
        </main>
        <footer>
            <?php
                include_once "footer.html";
            ?>
        </footer>
    </div>
</body>
</html>
