<?php
    $filep = fopen("../lorem.txt","a+");

    if(!$filep){
        die("파일을 열 수 없습니다");
    }
    print "파일을 열었습니다.<br>";

    fputs($filep, "\n\"ROMEO : I take thee at thy word\"");

    fclose($filep);

    $filep = fopen("../lorem.txt","r");


    while($line = fgets($filep, 1024)){
        print $line . "<br>";
    }

    fclose($filep);