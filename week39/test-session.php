<?php
session_start();

if(isset($_SESSION['visit'])){
    echo "You have visited here " . $_SESSION['visit'] . " times.";
    $_SESSION['visit']++;
} else{
    echo"The session cookie is not yet returned by the browser or not set yet";
}
foreach ($_SERVER as $key => $value) {
    echo '$_SERVER["' . $key . '"] = ' . $value . "<br />";
}