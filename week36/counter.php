<html>
    <head>
        <title>Counter</title>
    </head>
    <body>
    <?php
    $n = $_POST['n'];
    if($n == '"') {
        $n=0;
    }
    else {
        $n++;
    }
    echo "<h2>Counter: $n </h2>
    <form action='counter.php' method='post'>
    <input type='hidden' name='n' value='$n'/>
    <input type='submit' value='Down'/>
    </form>";
    ?>
    </body>
</html>
