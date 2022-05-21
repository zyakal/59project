<?php

    include_once "db.php";


    function create_store(&$param) {

        $store_mail = $param['store_email'];
        $store_pw = $param['store_pw'];
        $store_check_pw = $param['store_check_pw'];
        $nickname = $param['nickname'];
        $store_nm = $param['store_nm'];
        
        $sql = "INSERT INTO t_store
        (store_email,store_pw,nickname,store_nm)
        value
        ('$store_mail','$store_pw','$nickname','$store_nm')
        ";
            $conn = get_conn();
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            return $result;
        }
        
        function id_check(&$param)
        {
            $store_email = $param['store_email'];
        
            $sql = "SELECT store_email 
                    from t_store
                    where store_email = '$store_email' 
            ";
            $conn = get_conn();
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
            mysqli_close($conn); 
            if(isset($result['store_email']))
            {
            return true;
            }
            return false;
        }
        
        function login_store(&$param){
        
            $store_email = $param['store_email'];
    
                $sql = 
                "   SELECT *
                    from t_store
                    where store_email = '$store_email'
            ";
            $conn = get_conn();
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            mysqli_close($conn);
            return $row;
        }
        
        function upd_store_photo(&$param) {
            $sql = "UPDATE t_store
                       SET store_photo = '{$param["store_photo"]}' 
                     WHERE store_email = '{$param["store_email"]}'";
            $conn = get_conn();
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            return $result;
         }

         
        function sales_day(&$param){
            $mon = $param['mon'];
            $tue = $param['tue'];
            $wed = $param['wed'];
            $thu = $param['thu'];
            $fri = $param['fri'];
            $sat = $param['sat'];
            $sun = $param['sun'];
        
            $sql = 
            "   UPDATE t_store
                SET sales_day = '$mon $tue $wed $thu $fri $sat $sun'
                WHERE store_email = 'test@naver.com'
        
            ";
            $conn = get_conn();
        
            $result = mysqli_query($conn, $sql);
            return $result;
            
        }

        function store_time_insert($store_email){
            $store_open_hour = $_POST['store_open_hour'];           
            $store_open_minute = $_POST['store_opne_minute'];           
            $store_close_hour = $_POST['store_close_hour'];           
            $store_close_minute = $_POST['store_close_minute'];           
            $sql = 
            "   INSERT INTO t_store
                (sales_time)
                VALUE
                ('$store_open_hour$store_open_minute,$store_close_hour$store_close_minute')
                where store_email = '$store_email'
            ";
            $conn = get_conn();
            $result = mysqli_query($conn, $sql);   
            
            mysqli_close($conn);   
            return $result; 
        }