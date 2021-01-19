<html>
    <head>
            <title>
                Exchange Service
            </title>
    </head>
    <body>
        <h2>
            Exchange Service
        </h2>
    <?php
    $rate = 8.43;
    $fee = 20;
    // $_GET is an array of variables passed to the current script via the URL parameters.
    // $_POST is an array of variables passed to the current script via the HTTP POST method.
    // The method should match the form method in the html
    $kroner = $_POST["kroner"];
    $dollars = ($kroner - $fee) / $rate;
    $dollars = number_format($dollars, 2, ",", ".");
    echo "For Dkr. $kroner you receive \$$dollars";
    ?>
    <p>
        <a href="exchange.html">New Computation</a>
    </p>
    </body>
</html>
