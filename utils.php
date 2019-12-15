<?php

function page_header(string $title="Welcome")
{
    print "<html><head><title>$title</title></head>";
    print "<body bgcolor='c0c0c0'>";
    $user = $GLOBALS["user"];
    print "Hello $user nice to meet you";
    print "<hr>";
}

function page_foter()
{
    $user = $GLOBALS["user"];
    print "<hr> $user thank you for visit";
    print "</body></html>";
}