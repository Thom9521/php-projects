<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <h2>
            Welcome
        </h2>
    <?php

    $friends = $_GET['friends'];
    echo "Welcome $friends";

    // In the URL type:
    //welcome.php?friends=Donald%20%26%20Goofy
?>
    </body>
</html>
