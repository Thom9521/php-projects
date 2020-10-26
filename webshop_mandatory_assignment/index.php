<html>
    <head>
        <title>Webshop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Webshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addProducts.php">Manage Products</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php session_start(); if(!isset($_SESSION['loggedIn']))
                    echo ' <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>'
                ?>
                <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
                    echo ' <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>'
                ?>
            </ul>
        </div>
    </nav>
        <h2 class="display-2 mb-3">Index</h2>
        <?php
        if(isset($_SESSION['username']) && !isset($_SESSION['admin'])) echo '<p>Welcome <b>'. $_SESSION['username'] . '</b>';
        if(isset($_SESSION['username']) && isset($_SESSION['admin'])) echo '<p>Welcome your almighty admin <b>'. $_SESSION['username'] .'</b>';

        ?>
        <h2 class="mt-5">Choose a category</h2>
    </div>
    </body>
</html>

<?php

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){


// Connect to the database:
    $dbc = mysqli_connect('localhost', 'root', '', 'phpclasses');
    if (!$dbc) {
        echo "Something went wrong with the connection...";
    }
// Get products from database
    $categoryQuery ="SELECT * FROM categories WHERE parent_id = 0";
    $categoryResult = $dbc->query($categoryQuery);
    if (!$categoryResult) die($dbc->error);
    elseif ($categoryResult->num_rows) {
        echo '<div class="container">
                    <div class="row">';
        while($categoryRow = $categoryResult -> fetch_assoc()){
            echo'<div class="container">
                    <ul>
                    <li>'.$categoryRow["name"].'</li>
                    </ul> 
                 </div>';
        }
        echo'    </div>
             </div>';


    }else{
        echo "There are no categories in the database";
    }
}else{
echo "";
}

