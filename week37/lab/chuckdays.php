<?php
$day = date("l");
$name = "Chuck Norris";
//$chuckfacts = $name . " beats the sun in a staring contest";
$month = date("F");
$date = "$day, " . $month . ", " . date("d") . ", " . date("Y");
$date2 = "Monday, " . $month . ", " . date("d") . ", " . date("Y");
$date3 = "Saturday, " . $month . ", " . date("d") . ", " . date("Y");


$chuckfacts["$date"] = "$name beats the sun in a staring contest";
$chuckfacts["$date2"] = "$name once ordered a big mac at burger king, and got one";
$chuckfacts["$date3"] = "$name makes onions cry";

$thedate= $date2;
print_r($thedate);
echo"<br>";
print_r($chuckfacts[$thedate]);