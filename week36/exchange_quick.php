<html>
    <head>
        <title>Exchange Quick Service</title>
    </head>
    <body>
        <h2>Exchange Quick Service</h2>
    <?php
    $rate = 8.43;
    $fee = 20;
    $kroner = $_GET["kroner"];
    $dollars = ($kroner - $fee) / $rate;
    $dollars = number_format($dollars, 2, ",", ".");
    echo "For Dkr. $kroner you receive \$$dollars";
    ?>
    <p>
        <a href="exchange_quick.html">New Computation</a>
    </p>
    </body>
</html>

