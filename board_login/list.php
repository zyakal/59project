<?php
    include_once "db/db_board.php";
    session_start();
    $nm = "";
    $page = 1; 
    
    if(isset($_GET["page"])) { 
        $page = intval($_GET["page"]);        
    } 
    

    if(isset($_SESSION["login_user"])) {
        $login_user = $_SESSION["login_user"];
        $nm = $login_user["nm"];        
    }
    
    $row_count = 20;
    $param = [
        "row_count" => $row_count,
        "start_idx" => ($page - 1) * $row_count
    ];
    $paging_count = sel_paging_count($param);
    $list = sel_board_list($param);
    echo $list;
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <title>리스트</title>
    <style>
        table, tr {    
            border : 1px solid black;
            border-collapse : collapse;
            text-align: center;
            }
        
    </style>
</head>
<body>
    <div id="container">
        <header>
        <?=isset($_SESSION["login_user"]) ? "<div>". $nm . "님 환영합니다.</div>" : "" ?>
        <div>
            <a href="list.php">리스트</a>
            <?php if(isset($_SESSION["login_user"])) { ?>
                <a href="write.php">글쓰기</a>
                <a href="logout.php">로그아웃</a>
            <?php } else { ?> 
                <a href="login.php">로그인</a>            
            <?php } ?>           
            
        </div>
        </header>
        <main>
            <h1>리스트</h1>
            <table>
                <tr>
                    <th>글번호</th>
                    <th>제목</th>
                    <th>작성자명</th>
                    <th>등록일시</th>
                </tr>
                <?php
                
                while($row = mysqli_fetch_assoc($list))
                {
                    $i_board = $row['i_board'];
                    $title = $row['title'];
                    $created_at = $row['created_at'];
                    $name = $row['nm'];

                    print "<tr>";
                    print "<td>$i_board</td>";
                    print "<td><a href='detail.php?i_board=$i_board'>$title</a></td>";
                    print "<td>$name</td>";
                    print "<td>$created_at</td>";
                    print "</tr>";
                }
                ?>
            </table>
            <div>
            <?php for($i=1; $i<=$paging_count; $i++) { ?>
                <span class ="<?=$i===$page ? "pageSelected" : ""?>">
                    <a href="list.php?page=<?=$i?>"><?=$i?></a>
                </span>                    
            <?php } ?>
            </div>
            
           
        </main>
    </div>
    
    
    
</body>
</html>