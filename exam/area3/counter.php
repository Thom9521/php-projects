<html>
    <head>
        <title>Counter</title>
    </head>
    <body>
    <?php
    if(isset($_POST['n'])){
        $n = $_POST['n'];
        $n++;
    }
    else{
        $n=0;
    }
    
    echo "<h2>Counter: $n </h2>
    <form action='counter.php' method='post'>
    <input type='hidden' name='n' value='$n'/>
    <input type='submit' value='Down'/>
    </form>";
    ?>
    </body>
</html>
