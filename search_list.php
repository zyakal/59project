<?php
    include_once "db/db_list.php";

    $search_txt = $_GET['search_txt'];

    $param = [
        'search_txt' => $search_txt
    ];

    $result = search_result_list($param);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/screens/store_list.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>
            <nav class="header--nav">
                <div class="nav--logo">
                <a href="home.php" class="nav--back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a> 
                </div>
                <div class="nav--addr">
                    <a href="#">
                        <i class="fa-solid fa-location-dot"></i>
                        송현동
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                </div>
                <div class="nav--notice">
                    <a href="#">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </div>
            </nav>
        </header>
        <main class="search_list_main">
            <div class="search__main__list">
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        $param = [
                            '$store_num' => $row['store_num']
                        ];
                        $row = sel_result_store($param);
                        include_once "store_list_form.php";
                    }
                    
                ?>
            </div>
        </main>
    </div>
</body>
</html>