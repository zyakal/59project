<?php

    $n1 = 9;
    $n2 = 5;

    function sum($n1, $n2)
    { return $n1 + $n2 ;}
    function minus($n1, $n2)
    { return $n1 - $n2 ;}
    function multi($n1, $n2)
    { return $n1 * $n2 ;}
    function div($n1, $n2)
    { return $n1 / $n2 ;}
    function mod($n1, $n2)
    { return $n1 % $n2 ;}
    
    $A = sum($n1, $n2);
    $B = minus($n1, $n2);
    $C = multi($n1, $n2);
    $D = div($n1, $n2);
    $E = mod($n1, $n2);

    print "$A<br>";
    print "$B<br>";
    print "$C<br>";
    print "$D<br>";
    print "$E<br>";

?>






<?php
/*
    $n1 = 9;
    $n2 = 5;

    function print_sum($n1, $n2)
    { print "$n1 + $n2 = " . ($n1+$n2) . "<br>"; }

    function print_minus($n1, $n2)
    { print "$n1 - $n2 = " . ($n1-$n2) . "<br>"; }

    function print_multi($n1, $n2)
    { print "$n1 * $n2 = " . ($n1*$n2) . "<br>"; }

    function print_div($n1, $n2)
    { print "$n1 / $n2 = " . ($n1/$n2) . "<br>"; }

    function print_mod($n1, $n2)
    { print "$n1 % $n2 = " . ($n1%$n2) . "<br>"; }



    print_sum($n1, $n2);
    print_minus($n1, $n2);
    print_multi($n1, $n2);
    print_div($n1, $n2);
    print_mod($n1, $n2);


*/

?>




<?php 






    $n1 = 9;
    $n2 = 5;

    function print_result($num1, $symbol, $num2, $result)
    {
        print "$num1 $symbol $num2 = $result <br>";
    }
    function print_sum($num1, $num2) 
    {
        $result = $num1 + $num2;
        print_result($num1, "+", $num2, $result);
    }
    function print_minus($num1, $num2) 
    {
        print_result($num1, "-", $num2, ($num1 - $num2));
    }
    function print_multi($num1, $num2) 
    {
        print_result($num1, "*", $num2, ($num1 * $num2));
    }
    function print_div($num1, $num2) 
    {
        print_result($num1, "/", $num2, ($num1 / $num2));
    }
    function print_mod($num1, $num2) 
    {
        print_result($num1, "%", $num2, ($num1 % $num2));
    }
    print_sum($n1, $n2);
    print_minus($n1, $n2);
    print_multi($n1, $n2);
    print_div($n1, $n2);
    print_mod($n1, $n2);

    
?>