<?php
    $user = $_POST["user"];

    $hello_array["one"] = nl2br("Hello0, " . $user);
    $hello_array["two"] = nl2br("Hello1, " . $user);

    print "<table border='1'>\n";
    foreach ($hello_array as $key => $value) {
        print("<tr><td>$key</td><td>$value</td></tr>");
    }
    print "</table>";

    $hello_count = count($hello_array);
    print "Table size:$hello_count";