<?php

$connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
if ($connection->connect_error) die($connection->connect_error);

$query = "CREATE TABLE categories (
 ID int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(32) NOT NULL,
 parent_id int(32)
 )";

$result = $connection->query($query);
if (!$result) die($connection->error);

//Parent categories
$ID = 1;
$name = 'Furniture';
$parent_id = 0;
add_category($connection, $ID, $name, $parent_id);
$ID = 2;
$name = 'Electronics';
$parent_id = 0;
add_category($connection, $ID, $name, $parent_id);
$ID = 3;
$name = 'Food';
$parent_id = 0;
add_category($connection, $ID, $name, $parent_id);
$ID = 4;
$name = 'Wearables';
$parent_id = 0;
add_category($connection, $ID, $name, $parent_id);
$ID = 5;
$name = 'Vehicles';
$parent_id = 0;
add_category($connection, $ID, $name, $parent_id);

//Child categories
$ID = 6;
$name = 'Chairs';
$parent_id = 1;
add_category($connection, $ID, $name, $parent_id);
$ID = 7;
$name = 'Tables';
$parent_id = 1;
add_category($connection, $ID, $name, $parent_id);
$ID = 8;
$name = 'Headphones';
$parent_id = 2;
add_category($connection, $ID, $name, $parent_id);
$ID = 9;
$name = 'Keyboards';
$parent_id = 2;
add_category($connection, $ID, $name, $parent_id);
$ID = 10;
$name = 'TV';
$parent_id = 2;
add_category($connection, $ID, $name, $parent_id);
$ID = 11;
$name = 'Candy';
$parent_id = 3;
add_category($connection, $ID, $name, $parent_id);
$ID = 12;
$name = 'Fruit';
$parent_id = 3;
add_category($connection, $ID, $name, $parent_id);
$ID = 13;
$name = 'Cloths';
$parent_id = 4;
add_category($connection, $ID, $name, $parent_id);
$ID = 14;
$name = 'Glasses';
$parent_id = 4;
add_category($connection, $ID, $name, $parent_id);
$ID = 15;
$name = 'Cars';
$parent_id = 5;
add_category($connection, $ID, $name, $parent_id);

function add_category($connection, $id, $na, $p_id)
{
    $query = "INSERT INTO categories VALUES($id,'$na','$p_id')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
}
