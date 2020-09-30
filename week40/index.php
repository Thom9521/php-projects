<?php
require_once ("Person.php");
require_once ("Friend.php");

$p1 = new Person("Joe");

echo $p1->getName();
echo "<br/>";
$f1 = new Friend("Michael", "Football");
echo $f1->getName();
echo $f1->getHobby();
echo $f1->showPhone();