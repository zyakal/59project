<?php

    include_once "../db/db_store.php";

    session_start();
    $login = $_SESSION['login_store'];
    $store_email = $login['store_email'];   

    store_time_insert($store_email);

    if($result){
        header("location: store_main.php");
    }
    