<?php
<<<<<<< HEAD
// define("URL", "192.168.0.70");
=======
// 192.168.0.70
>>>>>>> 0c682d13bb84d99159829702b4a0e927033e4105
define("URL", "localhost");
define("USERNAME", "root");
define("PASSWORD", "1234");
define("DB_NAME", "59project");
define("PORT", "3306");

function get_conn()
{
    return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME, PORT);
}
