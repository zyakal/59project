<?php
    include_once "db/db_list.php";

    $my_lat = $_GET['my_lat'];
    $my_lng = $_GET['my_lng'];

    $result = store_distance($my_lat, $my_lng, 35.8700317, 128.6005225);
    print $result;