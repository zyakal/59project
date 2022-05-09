<?php
    include_once "db.php";

    $conn = get_conn();
    $sql = "SELECT i_board, title, create_at, mod_at FROM t_board ORDER BY i_board DESC";
    $result = mysqli_query($conn, $sql); 
    #mysqli_query는 select 빼고는 영향끼친 행수를 불러온다. select는 selet된 데이터를 불러온다. 

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트</title>
</head>
<body>
    <h1>리스트</h1>
    <a href="write.php"><button>글쓰기</button></a>
    <table>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성일시</th>
            <th>수정일시</th>
            
        </tr>
        <?php
            # mysqli_fetch_assoc 은 실행될때마다 다음 줄의 값을 불러온다
            while($row = mysqli_fetch_assoc($result))
            {

            $i_board = $row['i_board'];
            $title = $row['title'];
            $create_at = $row['create_at'];
            $mod_at = $row['mod_at'];

            print "<tr>";
            print "<td>${i_board}</td>";
            print "<td><a href='detail.php?i_board=${i_board}'>${title}</a></td>";
            print "<td>${create_at}</td>";
            print "<td>${mod_at}</td>";
            print "</tr>";
            }
            
        ?>
    </table>
</body>
</html>