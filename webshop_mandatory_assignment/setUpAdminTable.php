<?php

$connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
if ($connection->connect_error) die($connection->connect_error);

$query = "CREATE TABLE users (
ID int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(32) NOT NULL,
 phone int(32) NOT NULL,
 address VARCHAR(60) NOT NULL,
 email VARCHAR(60) NOT NULL,
 password VARCHAR(32) NOT NULL, 
 isAdmin BOOLEAN NOT NULL
 )";

$result = $connection->query($query);
if (!$result) die($connection->error);
$salt1 = "qm&h*";
$salt2 = "pg!@";
$ID =1;
$name = 'Thomas';
$phone=12345678;
$address="adminvej 10";
$email="admin@admin.dk";
$password = 'admin123';
$isAdmin = true;
$token = hash('ripemd128', "$salt1$password$salt2");
add_user($connection,$ID, $name, $phone, $address, $email, $token, $isAdmin);


function add_user($connection, $i, $na, $ph, $ad, $em, $pw, $ia)
{
    $query = "INSERT INTO users VALUES($i,'$na', '$ph', '$ad', '$em','$pw','$ia')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
}
