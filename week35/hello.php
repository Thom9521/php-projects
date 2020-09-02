<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body bgcolor="#7fffd4">
<h1>Hello Thomas!!</h1>
<button>Click</button>
<br> <br>
<?php
$name = "Thomas";
//Newline doesnt work in the browser but in the terminal
echo "Hello again $name \n newline";
echo 'The variable is $name';
echo "<br>";
//Double quotes reads the variables

//Heredoc format:
echo <<<TEST
Hello everyone
TEST;

$str = "W";
$str{1} = "I";
$str{2} = "L";
//Prints all
echo $str;
//Prints I
echo $str{1};
echo "<br>";
// Constants:
define('NAME', 'Thomas');
define('GENDER', 'Male');
echo NAME . " is a " . GENDER . "<br>";

$fuel = 10;
while($fuel >= 1){
    echo "The fuel is at $fuel" . "<br>";
    --$fuel;
}

$count = 0;
while(++$count <= 12){
    echo "$count times 12 is " . $count * 12 . "<br>";
}
?>

</body>
</html>