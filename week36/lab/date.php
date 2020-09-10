<?php
$day = date("l");
$name = "Chuck Norris";
$chuckfacts = $name . " beats the sun in a staring contest";
$month = date("F");
$date = "$day, " . $month . ", " . date("d") . ", " . date("Y");

echo "Day is " . $day . "<br>";
echo "Month is " . $month . "<br>";
echo "Today is " . $date . "<br>";
echo $chuckfacts;
