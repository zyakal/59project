<?php
    session_start();
    session_destroy();
    echo $_SESSION['var1'], "<br>";
    echo $_SESSION['var2'], "<br>";
    ?>
<a href="confirm.php">확인</a>