<html>

<head>
    <title>Home</title>
</head>

<body bgcolor="#c0c0c0">
    <?php
    print nl2br("<hr>");
    require "test_form.php";

    print nl2br("<hr>");
    require "test_dish.php";

    print nl2br("<hr>");
    $_SESSION["name"] = "Master";
    require "test_file.php"
    ?>
</body>

</html>