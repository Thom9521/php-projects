<!DOCTYPE HTML>
<html>
<head>
    <title>Treasure Map</title>
</head>
<body style="background-image:url(map.jpg); background-repeat: no-repeat">


<?php
    for ($i = 1; $i<=10; $i++) {
        $left = rand(10, 650) . "px";
        $top = rand(10, 400). "px";

        echo "<div style='position: absolute; left: $left; top: $top'>
              <img src='coin.png' height='50px'/>
              </div>";
    }
?>

</body>
</html>
