<?php
// define("URL", "192.168.0.70");
// define("USERNAME", "root");
// define("PASSWORD", "506greendg@");
// define("DB_NAME", "59project");
// define("PORT", "3306");

// function get_conn()
// {
//     return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME, PORT);
// }

define("URL", "127.0.0.1");
define("USERNAME", "root");
define("PASSWORD", "0915");
define("DB_NAME", "59project");
define("PORT", "3306");

function get_conn()
{
    return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME, PORT);
}
