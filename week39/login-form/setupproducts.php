<?php


$connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
if ($connection->connect_error) die($connection->connect_error);

$query = "CREATE TABLE products2 (
ID int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(32) NOT NULL,
 price int(32) NOT NULL
 )";

$result = $connection->query($query);
if (!$result) die($connection->error);

$ID = 1;
$name = 'Chair';
$price = 100;
add_product($connection, $ID, $name, $price);
$ID = 2;
$name = 'Car';
$price = 3000000;
add_product($connection, $ID, $name, $price);
$ID = 3;
$name = 'Glasses';
$price = 2500;
add_product($connection, $ID, $name, $price);
$ID = 4;
$name = 'Bottle';
$price = 25;
add_product($connection, $ID, $name, $price);


function add_product($connection, $id, $na, $pr)
{
    $query = "INSERT INTO products2 VALUES($id,'$na','$pr')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
}
