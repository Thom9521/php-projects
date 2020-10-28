<?php
//PDO = PHP DATA OBJECTS
// Its safe and object oriented

// Checking the available databases
//print_r(PDO::getAvailableDrivers());

try {
    $handler = new PDO('mysql:host=localhost; dbname=phpclasses', 'root', '');
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo $e->getMessage();
    die();
}

$query = $handler->query('SELECT * FROM users');

/*
while($r = $query->fetch()){
    echo $r['name'] . '<br>';
}

$result = $query->fetch(PDO::FETCH_ASSOC);
echo '<pre>' , print_r($result) , '</pre>';


// Here we call the result as an object so we can just get the 'name' row fx.
$r = $query->fetch(PDO::FETCH_OBJ);
echo $r->name;

// Fetching all rows in the table
$r = $query->fetchAll(PDO::FETCH_OBJ);
echo '<pre>', print_r($r) ,'</pre>';

// Fetching all names in the table
while($r = $query->fetch(PDO::FETCH_OBJ)){
    echo $r->name . '<br>';
}

$query->setFetchMode(PDO::FETCH_CLASS, 'Product');
while($r = $query->fetch()){
    echo '<pre>', print_r($r) ,'</pre>';
}
*/




//Prepared statements: to secure or DB
/*

$name = 'Thomas';
$phone = 12312312;
$address = "road";
$email = 't@t.dk';
$password = 'admin123';
// The values are placeholders
$sql= "INSERT INTO users (name, phone, address, email, password) VALUES(:name, :phone, :address, :email, :password)";

$query = $handler->prepare($sql);
$query->execute(
    array(
        ':name' => $name,
        ':phone' =>$phone,
        ':address'=>$address,
        ':email'=>$email,
        ':password'=>$password)
);

// Short version: here the values must be in the right order
$sql= "INSERT INTO users (name, phone, address, email, password) VALUES(?, ?, ?, ?, ?)";
$query = $handler->prepare($sql);
$query->execute(
    array(
        $name,
        $phone,
        $address,
        $email,
        $password
    )
);

// Gets the last inserted ID
$lastInsertedId = $handler->lastInsertId();
echo $lastInsertedId;
*/


$query->setFetchMode(PDO::FETCH_CLASS, 'User');
/*
while($r = $query->fetch()){
    echo '<pre>', print_r($r) ,'</pre>';
}
*/
while($r = $query ->fetch()){
    echo $r->message, '<br>';
}

class User{
    public $ID, $name, $phone, $address, $email, $password, $isAdmin, $message;

    public function __construct(){
        $this->message = "$this->name says hello";
    }
    public function getEmail(){
        return $this->email;
    }
}

