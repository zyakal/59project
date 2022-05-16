<?php
define("URL", "localhost");
define("USERNAME", "root");
define("PASSWORD", "506greendg@");
define("DB_NAME", "59project");

function get_conn()
{
    return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME); // 포트번호가 다르면 뒤에 ,"3308");이렇게 붙여주면 된다
}