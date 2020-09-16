<?php


$url = file_get_contents("http://smartict.dk/smartict/login.php");

preg_match('/[0-9]+.[0-9]+.[0-9]+.[0-9]+/', $url, $result);

var_dump($result);