<html>
    <head>
        <title>Addition Service</title>
    </head>
    <body>
    <?php
        $a = $_GET['a'];
        $b = $_GET['b'];
        $sum = $a + $b;
        echo "The sum of $a and $b is $sum";

    //In the URL type:
    //add.php?a=2&b=5
    ?>

    </body>
</html>
