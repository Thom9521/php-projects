<?php
class Person{
// A class has a default constructor that is called if no constructor has been declared
// Protected restriction makes it visible to the parent class and children classes
private $name;
protected $address = "Maglgaardsvej, Roskilde";
protected $phone ="12345678";
function __construct($name){
    $this->name=$name;
}

    public function getName(){
    return $this->name;
}
public function setName($newName){
    $this->name = $newName;
}

    public function getAddress()
    {
        return $this->address;
    }
}