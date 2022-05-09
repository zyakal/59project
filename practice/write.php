<?php
    include_once './functions.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include_once './common_style.inc' ; ?>

        .ques_head
        {
            background-color : #F9E79D;
            text-align : center;
        }

        .input_td
        {
            background-color : #FEFCE2;
        }
    </style>
</head>
<body>
    <form name="write_form" method ="post" action="write_db.php">
        <center>
            <table>
                <tr>
                    <td class="ques_head">글쓴이</td>
                    <td class="input_td">
                        <input type="text" name="name" size="10" maxsize="10">
                    </td>
                </tr>
                <tr>
                    <td class="ques_head">e-mail</td>
                    <td class="input_td">
                        <input type="text" name="email" size="40" maxsize="50">
                    </td>
                </tr>
                <tr>
                    <td class="ques_head">홈페이지</td>
                    <td class="input_td">
                        <input type="text" name="homepage" size="40" maxsize="50">
                    </td>
                </tr>
                <tr>
                    <td class="ques_head">암호</td>
                    <td class="input_td">
                        <input type="text" name="passwd" size="10" maxsize="10">
                    </td>
                </tr>
                <tr>
                    <td class="ques_head">제목</td>
                    <td class="input_td">
                        <input type="text" name="subject" size="50" maxsize="255">
                    </td>
                </tr>
                <tr>
                    <td class="ques_head">내용</td>
                    <td class="input_td">
                        <textarea name="article" cols="60" rows="20"></textarea>
                    </td>
                </tr>
                
            </table>
            <table>
                <tr>
                    <td width="100">$nbsp;</td>
                    <td align="center"><input type="submit" value="입력"></td>
                    <td width="100" align = "right">
                        <a href="<?=dest_url("./list.php",$page)?>">목록</a>
                    </td>
                </tr>
            </table>
        </center>
    </form>
    
</body>
</html>