<?php
    // 맵?
    $freshman = array(
        "David" => "Computer",
        "Alice" => "Math",
        "Elsa"  => "Physics",
        "Bob"   => "Music",
        "Chris" => "Electronics"
    );

    print_r($freshman);
    print "<br><br>";
    print $freshman["David"] . "<br>";
    print $freshman["Alice"] . "<br>";
    print $freshman["Elsa"] . "<br>";
    print $freshman["Bob"] . "<br>";
    print $freshman["Chris"] . "<br>";

    $freshman["Bob"] = "Dance";
    print "<br><br>";
    print $freshman["Bob"] . "<br>";


?>