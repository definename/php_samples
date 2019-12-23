<html>

<head>
    <title>Home</title>
    <!-- <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="expires" content="0"> -->
</head>

<body bgcolor="#c0c0c0">

    <?php
    session_start();
    if (isset($_SESSION["count"])) {
        $_SESSION["count"] += 1;
    } else {
        $_SESSION["count"] = 1;
    }
    // ....................................................................

    print nl2br("<hr>");
    require "test_form.php";

    print nl2br("<hr>");
    require "test_dish.php";

    print nl2br("<hr>");
    $_SESSION["name"] = "Master";
    require "test_file.php";

    print nl2br("<hr>");
    require "search.php";

    print nl2br("<hr>");
    require "guest_book.php";

    // ....................................................................
    print "You have looked at this page " . $_SESSION["count"] . " times";
    ?>
</body>

</html>