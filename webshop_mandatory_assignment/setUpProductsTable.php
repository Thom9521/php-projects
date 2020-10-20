<?php


$connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
if ($connection->connect_error) die($connection->connect_error);

$query = "CREATE TABLE products (
ID int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(32) NOT NULL,
 price int(32) NOT NULL,
 imagePath VARCHAR(256) NOT NULL,
 description VARCHAR(256) NOT NULL
 )";

$result = $connection->query($query);
if (!$result) die($connection->error);

$ID = 1;
$name = 'Chair';
$price = 100;
$imagePath = 'https://freepngimg.com/thumb/chair/45-chair-png-image.png';
$description = 'Chair description';
add_product($connection, $ID, $name, $price, $imagePath, $description);
$ID = 2;
$name = 'Car';
$price = 3000000;
$imagePath = 'https://i.ytimg.com/vi/sMzB3gkZILc/maxresdefault.jpg';
$description = 'Car description';
add_product($connection, $ID, $name, $price, $imagePath, $description);
$ID = 3;
$name = 'Glasses';
$price = 2500;
$imagePath = 'https://pngimg.com/uploads/glasses/glasses_PNG54349.png';
$description = 'Glasses description';
add_product($connection, $ID, $name, $price, $imagePath, $description);
$ID = 4;
$name = 'Bottle';
$price = 25;
$imagePath = 'https://assets.stickpng.com/images/580b585b2edbce24c47b2780.png';
$description = 'Bottle description';
add_product($connection, $ID, $name, $price, $imagePath, $description);


function add_product($connection, $id, $na, $pr, $ip, $dc)
{
    $query = "INSERT INTO products VALUES($id,'$na','$pr','$ip','$dc')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
}
