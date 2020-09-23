<?php
session_start();

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){


// Connect to the database:
    $dbc = mysqli_connect('localhost', 'root', '', 'phpclasses');
    if (!$dbc) {
        echo "Something went wrong with the connection...";
    }


    $productQuery ="SELECT * FROM products2";
    $productResult = $dbc->query($productQuery);
    if (!$productResult) die($dbc->error);
    elseif ($productResult->num_rows) {
        echo "<h2>Products:</h2>";
        while($productRow = $productResult -> fetch_assoc()){
            echo "<p> Product " .$productRow['ID']. " is: " . $productRow['name'] .
                " with a price of " . $productRow['price'] . "</p>";
        }

    }else{
        echo "There are no products in the database";
    }
    echo "<a href='login.php'>Logout</a>";
}else{
    echo "You are not authorized";
    echo "<br/>";
    echo "<a href='login.php'>Go back</a>";
}

