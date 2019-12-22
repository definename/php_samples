<?php

require "dish.php";

use \Order\Dish;
use \Order\ComboDish;

$ingredients = ["Water", "Chiken", "Pickles"];

$soup = new Dish("Soup", array("Chiken", "Water"));
foreach ($ingredients as $ing) {
    if ($soup->has_ingredient($ing)) {
        print nl2br("Soup contains $ing\n");
    }
}

$sandwich = new Dish("Sandwich", array("Bread", "Chiken"));
$combo = new ComboDish("Soup + Sandwich", [$soup, $sandwich]);
foreach ($ingredients as $ing) {
    if ($combo->has_ingredient($ing)) {
        print nl2br("Something in combo contains $ing\n");
    }
}