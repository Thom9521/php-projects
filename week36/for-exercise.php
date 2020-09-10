<?php
// Construct a loop that outputs 64, 32, 16, 8, 4, 2, 1:

for ($i = 64; $i >= 1; $i = $i/2){
    echo "$i, ";
}

echo "<br>";

// Construct a loop that outputs 2, 4, 6, 8, . . . , 100:

for($i=2; $i<=100; $i = $i +2){
    echo "$i, ";
}

echo "<br>";

// Construct a loop that outputs 100, 110, 120, . . . , 200:

for($i=100; $i <= 200; $i = $i +10){
    echo "$i, ";
}