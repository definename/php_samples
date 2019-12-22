<?php

$filename = "file_template.html";
if (is_readable($filename)) {
    if (($content = @file_get_contents($filename))) {
        $content = str_ireplace("{name}", $_SESSION["name"], $content);
        print $content;
    } else {
        print nl2br("Failed to retrieve content of $filename\n");
    }
} else {
    print nl2br("File '$filename' is not readable\n");
}