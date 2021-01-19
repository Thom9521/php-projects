<?php

interface Animal {
    public function makeSound();
}

class Cat implements Animal {
    public function makeSound() {
        echo "Meow";
    }
}
class Dog implements Animal{
    public function  makeSound()
    {
        echo "Wuf";
    }
}

$cat = new Cat();
$cat->makeSound();
$dog = new Dog();
$dog->makeSound();