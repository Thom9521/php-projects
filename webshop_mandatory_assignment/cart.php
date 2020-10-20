<?php
session_start();
print_r($_SESSION['cart']);

$whereIn = implode(',', $_SESSION['cart']);

$sql = "SELECT * FROM products WHERE id IN ($whereIn)";

echo $sql;

