<?php

function zero(){
    echo "Hello, my name is Thomas <br>";
}
zero();

function one($name){
    echo"Hello, my name is $name <br>";
}
one("Thomas");

function two($firstname, $lastname){
    $firstnameToUpper = ucfirst($firstname);
    $lastnameToUpper = ucfirst($lastname);

    $names = $firstnameToUpper . " " . $lastnameToUpper . "<br>";
    return print_r($names);
}
two("thomas", "christensen");

function three($name, $age, $tired){
    if($tired === true){
        echo "$name is $age years old and he must drink some coffee to wake up! <br>";
    }
    else{
        echo "$name is $age years old and he does not need coffee! <br>";
    }
}
three("Thomas", 24, true);

$namesArray = array( );
function four($name1, $name2, $array){
$array[0] = $name1;
$array [1] = $name2;

echo "The names array contains $array[0] and $array[1] <br>";
}
four("Thomas", "Marcus", $namesArray);

function five($firstname, $lastname){
    two($firstname, $lastname);
}
five("bob", "hansen");