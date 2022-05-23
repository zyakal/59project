<?php    
    include_once "db/db_list.php";

    $search_txt = $_POST['search_txt'];
    //공백 제거 preg_replace함수
    $search_txt_re = preg_replace('/\s+/', "",  $search_txt);
    if($search_txt_re == "") {
        print "빈칸을 검색함";
    } else {
        $param = [
            'search_txt' => $search_txt
        ];
        $result = ins_search($param);
        header("Location: search.php");
    }


