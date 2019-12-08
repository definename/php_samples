<?php
    $user = $_POST["user"];
    for ($i = 0; $i < 10; $i++) {
        print nl2br("Hello, " . $user . "\n");
    }