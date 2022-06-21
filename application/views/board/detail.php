<!DOCTYPE html>
<html lang="en">
<?php include_once "application/views/template/head.php"; ?>
<body>
    <h1>디테일</h1>
    <div><button id="btnDel" data-i_board="<?=$this->data->i_board?>">삭제</button></div>
    <a href="mod?i_board=<?=$this->data->i_board?>"><button>수정</button></a>
    <table>
        <thead>
                <tr>
                    <th>글번호</th>
                    <th>제목</th>
                    <th>내용</th>
                    <th>글쓴이</th>
                    <th>작성일</th>
                    <th>수정일</th>
                </tr>
        </thead>
        <tbody>

                <tr>
                    <?php foreach($this->data as $item)  { print '<td>' . $item . '</td>';} ?>
                </tr>
        </tbody>
    </table>
</body>
</html>