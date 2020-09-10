<?php
$paper[]="Copier";
$paper[]="Inkjet";
$paper[]="Laser";
$paper[]="Photo";

print_r( $paper);

echo "<br>";
$papper["Copier"] ="Copy something";
$papper["Inkjet"] ="Print something";

echo"<pre>";
print_r($papper);
echo"</pre>";

//var_dump gives a more detailed explanation of the output
var_dump($papper);

echo "<br>";
$p = array("hi", "hey", "hello");
print_r($p);

echo"<br>";

for ($i=0; $i < 4; $i++){
    echo "$i: $paper[$i] <br>";
}

$number= 0;
foreach ($paper as $item){
    echo"$number: $item <br>";
    $number++;
}