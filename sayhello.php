<?php

function page_header($title="Welcome")
{
    print "<html><head><title>$title</title></head>";
    print "<body bgcolor='c0c0c0'>";
    $user = $GLOBALS["user"];
    print "Hello $user nice to mite you";
    print "<hr>";
}

function page_foter()
{
    $user = $GLOBALS["user"];
    print "<hr> $user thank you for visit";
    print "</body></html>";
}

$user = $_POST["user"];

page_header();

$state_city_population = array("New York" => array("New York" => 8175133),
                                "California" => array("Los Angeles" => 3792621,
                                                    "San Diego" => 1307402));

$total_population = 0;
foreach ($state_city_population as $state => $city_population) {
    print("State:$state");
    print nl2br("<table border='1'>\n");
    foreach ($city_population as $city => $population) {
        print("<tr><td>$city</td><td>$population</td></tr>");
        $total_population += $population;
    }
    print nl2br("</table>\n");
}
print nl2br("Total population:" . $total_population);

page_foter();