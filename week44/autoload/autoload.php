<?php
/*
require_once 'cat.php';
require_once 'dog.php';
require_once 'cow.php';
*/

// with autoload we don't have to require each class specifically

spl_autoload_register(function ($className){
    if(file_exists($className . '.php')) {
        require_once $className . '.php';
    }
    elseif(file_exists('cowFolder' . $className . '.php')){
        require_once 'cowFolder' . $className . '.php';
    }
});
