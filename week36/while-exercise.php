<?php
//  Write a while-loop that outputs 64, 32, 16, 8, 4, 2, 1
$i = 64;
while($i >= 1){
    echo"$i, ";
    $i = $i/2;
}

echo "<br>";

//  Write a while-loop that outputs 2, 4, 6, 8, . . . , 100:
$i = 2;
while($i <= 100){
    echo "$i, ";
    $i = $i + 2;
}

echo "<br>";

//  Write a while-loop that outputs 100, 110, 120, . . . , 200:

$i = 100;
while ($i <= 200){
    echo "$i, ";
    $i = $i + 10;
}