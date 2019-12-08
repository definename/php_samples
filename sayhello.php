<?php
    $user = $_POST["user"];

    $hello_array[] = nl2br("Hello0, " . $user);
    $hello_array[] = nl2br("Hello1, " . $user);

    print "<table>\n";
    foreach ($hello_array as $key => $value) {
        print("<tr><td>$key</td><td>$value</td></tr>");
    }
    print "</table>";

    $hello_count = count($hello_array);
    print "Table size:$hello_count";