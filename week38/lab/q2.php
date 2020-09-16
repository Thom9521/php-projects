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
if ( preg_match('/^(0|[1-9][0-9]*)$/', $kroner) ) {
    $dollars = ($kroner - $fee) / $rate;
    if ($kroner > $fee) {

        $dollars = number_format($dollars, 2, ",", ".");
        echo "For Dkr. $kroner you receive \$$dollars";
    } else {
        echo "You cannot change an amount less than the commission!";
    }
}
else {
    echo "Please enter a valid number";
}
?>
<p>
    <a href="q2.html">New Computation</a>
</p>
</body>
</html>
