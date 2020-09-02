<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body bgcolor="#7fffd4">
<?php
$fuel = 10;
while($fuel >= 1){
    echo "The fuel is at $fuel" . "<br>";
    --$fuel;
}
echo "<br>";
$count = 0;
while(++$count <= 12){
    echo "$count times 12 is " . $count * 12 . "<br>";
}
?>

</body>
</html>