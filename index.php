<html>

<head>
    <title>Home</title>
</head>

<body bgcolor="#c0c0c0">
    <form id="say" method="POST" action="process.php">
        Your name: <input type="text" name="user" />
    </form>
    <button form="say" type="submit">Submit</button>

    <?php

    use \Order\Dish;
    use \Order\ComboDish;

    print nl2br("<hr>Class:\n");
    require "dish.php";

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

?>

</body>

</html>