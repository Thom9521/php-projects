<?php

$connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
if ($connection->connect_error) die($connection->connect_error);

$query = "CREATE TABLE users (
ID int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(32) NOT NULL,
 password VARCHAR(32) NOT NULL
 )";

$result = $connection->query($query);
if (!$result) die($connection->error);
$salt1 = "qm&h*";
$salt2 = "pg!@";
$ID =1;
$name = 'Thomas';
$password = 'admin123';
$token = hash('ripemd128', "$salt1$password$salt2");
add_user($connection,$ID, $name, $token);


function add_user($connection, $i, $na, $pw)
{
    $query = "INSERT INTO users VALUES($i,'$na', '$pw')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
}
