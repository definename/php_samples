<?php

$content = @file_get_contents("file_template.html");
if ($content) {
    $content = str_ireplace("{name}", $_SESSION["name"], $content);
    print $content;
} else {
    print nl2br("Failed to open template file\n");
}