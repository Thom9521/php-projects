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
echo "Hello again $name";
echo "<br>";
echo 'The variable is $name';
echo "<br>";
//Double quotes reads the variables

//Heredoc format:
echo <<<TEST
Hello everyone
TEST;
?>

</body>
</html>