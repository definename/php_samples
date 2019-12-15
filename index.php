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
    print nl2br("<hr>Class:\n");
    require "dish.php";

    $soup = new Dish;
    $soup->name = "Chiken soup";
    $soup->ingredients[] = "Chiken";
    $soup->ingredients[] = "Water";

    foreach (["Water", "Chiken", "Carrot"] as $ing) {
        if ($soup->has_ingredient($ing)) {
            print nl2br("+Soup contains $ing\n");
        } else {
            print nl2br("-Soup does not contain $ing\n");
        }
    }
?>

</body>

</html>