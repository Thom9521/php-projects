<html>
<head>
    <title>Sign up</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
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
                <li class="nav-item">
                    <a class="nav-link" href="addProducts.php">Add Products</a>
                </li>

            </ul>


        </div>
    </nav>
    <form action="signup.php" method="post">
        <div class="container">
            <h1 class="display-2 mb-4">Sign Up</h1>
            <input class="form-control" placeholder="Name" type="text" name="name" required/>
            <br/>
            <input class="form-control" placeholder="Password" type="password" name="password" required/>
            <br/>
            <input class="btn btn-primary" type="submit" value="Sign Up">
        </div>

    </form>
</div>

</body>
</html>

<?php

$connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
if ($connection->connect_error) die($connection->connect_error);

$salt1 = "qm&h*";
$salt2 = "pg!@";
$isAdmin = false;
if(isset($_POST['name'])){
    $name = $_POST['name'];

}
if(isset($_POST['password'])){
    $password = $_POST['password'];

}
if(isset($_POST['password'])){
    $token = hash('ripemd128', "$salt1$password$salt2");

}

if(isset($_POST['name']) && isset($_POST['password'])){
    add_user($connection, $name, $token, $isAdmin);
}


function add_user($connection, $na, $pw, $iA)
{
    $query = "INSERT INTO users(name, password, isAdmin) VALUES('$na', '$pw', '$iA')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    if($result){
        echo "<div class='container'>Welcome to the system <b>" .$na . "</b>. You are now able to see all the 
              <a href='products.php'>products</a>.</div>";

        $_SESSION['loggedIn'] = true;

    }
}

