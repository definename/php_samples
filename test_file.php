<?php

$filename = "file_template.html";
if (is_readable($filename)) {
    if (($content = @file_get_contents($filename))) {
        $content = str_ireplace("{name}", $_SESSION["name"], $content);
        print $content . nl2br(PHP_EOL);
    } else {
        print nl2br("Failed to retrieve content of $filename\n");
    }
} else {
    print nl2br("File '$filename' is not readable\n");
}