<?php

$person = array ( );
$person[0] = 'Ole';
$person[1] = 'Hans';
$person[ ] = 'Niels';
$person[7] = 'Willy';
$person[ ] = 'Henrik';
$person['name'] = 'Kristian';
$person[10] = array ('First Name'=> 'Jan' , 'Sure Name' => 'Johansen', 'Tlf' => 28356208);

$i = 0;
foreach ($person as $p => $value )
    if(is_array($value)) {
        foreach ($value as $f => $info){
            echo"Index is $f Value is $info <br>";
        }
    }
else{
 echo "Index is $i Value is $value <br>";
 $i++;
}

//array map
function myFunction($a1)
{
    if (!is_array($a1)) {

        return ("Value is " . $a1);
    }else return;
}
print_r(array_map("myFunction", $person));


// sort
// change sort to asort to keep index association
sort($person);
foreach($person as $p => $value){
    if(is_array($value)){
        foreach ($value as $v => $data){
            echo"Person[" . $v . "] = " . $data . "<br>";

        }
    }else{


    echo"Person[" . $p . "] = " . $value . "<br>";
    }
}

$students = array(
    256 => array('name' => 'Jon', 'grade' => 98.5),
    2 => array('name' => 'Vance', 'grade' => 85.1),
    9 => array('name' => 'Stephen', 'grade' => 94.0),
    364 => array('name' => 'Steve', 'grade' => 85.1),
    68 => array('name' => 'Rob', 'grade' => 74.6)
);

echo "<br>";
echo "<h2>Students </h2>";
sort($students);
foreach($students as $p => $value){
    if(is_array($value)){
        foreach ($value as $v => $data){
            echo"On index ". $p ." we have person[" . $v . "] = " . $data . "<br>";

        }
    }
}