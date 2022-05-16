<<<<<<< HEAD
<?php
define("URL","localhost");
define("USERNAME","root");
define("PASSWORD","506greendg@");
define("DB_NAME","59project");
define("PORT","3306");

function get_conn(){
    mysqli_connect(URL,USERNAME,PASSWORD,DB_NAME,PORT);
}
=======
<?php
define("URL", "192.168.0.70");
define("USERNAME", "root");
define("PASSWORD", "506greendg@");
define("DB_NAME", "59project");
define("PORT", "3306");

function get_conn()
{
    return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME, PORT);
}
>>>>>>> 426d8c2635c6cf531241f5f262c0120815230c3a
