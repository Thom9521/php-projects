<?php


$connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
if ($connection->connect_error) die($connection->connect_error);

$query = "CREATE TABLE products (
ID int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(32) NOT NULL,
 price int(32) NOT NULL,
 imagePath VARCHAR(256) NOT NULL,
 description VARCHAR(256) NOT NULL,
 category VARCHAR(32) NOT NULL
 )";

$result = $connection->query($query);
if (!$result) die($connection->error);

$ID = 1;
$name = 'Chair';
$price = 100;
$imagePath = 'https://freepngimg.com/thumb/chair/45-chair-png-image.png';
$description = 'Chair description';
$category = "Furniture";
add_product($connection, $ID, $name, $price, $imagePath, $description, $category);
$ID = 2;
$name = 'Car';
$price = 3000000;
$imagePath = 'https://i.ytimg.com/vi/sMzB3gkZILc/maxresdefault.jpg';
$description = 'Car description';
$category = "Vehicle";
add_product($connection, $ID, $name, $price, $imagePath, $description, $category);
$ID = 3;
$name = 'Glasses';
$price = 2500;
$imagePath = 'https://pngimg.com/uploads/glasses/glasses_PNG54349.png';
$description = 'Glasses description';
$category = "Wearables";
add_product($connection, $ID, $name, $price, $imagePath, $description, $category);


function add_product($connection, $id, $na, $pr, $ip, $dc, $ca)
{
    $query = "INSERT INTO products VALUES($id,'$na','$pr','$ip','$dc', '$ca')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
}
