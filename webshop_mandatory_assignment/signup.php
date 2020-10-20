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
    <?php
    $nameErr = "";
    $phoneErr = "";
    $addressErr = "";
    $emailErr = "";
    $passwordErr = "";

    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    $isAdmin = false;
    $regexError = false;
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        if(!preg_match("/^[a-zA-Z']*$/",$name)){
            $regexError=true;
            $nameErr= '<div style="color: red">Name must be alphabetic only</div>';
        }
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
        if(!preg_match('/^[0-9]{8}$/',$phone)){
            $regexError=true;
            $phoneErr= '<div style="color: red">Phonenumber must be exact 8 digits</div>';
        }
    }
    if(isset($_POST['address'])){
        $address = $_POST['address'];
        if(!preg_match("/^[a-zA-Z\d, ]*$/",$address)){
            $regexError=true;
            $addressErr= '<div style="color: red">Address may only contain alphanumeric, commas, and spaces</div>';
        }
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        if(!preg_match("/^[a-zA-Z\d._-]+@([a-zA-Z\d-]+.)+[a-z]{2,6}$/", $email)){
            $regexError=true;
            $emailErr= '<div style="color: red">The email must be a common email format</div>';
        }
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    if(isset($_POST['password'])){
        $token = hash('ripemd128', "$salt1$password$salt2");
    }

    ?>
    <form action="signup.php" method="post">
        <div class="container">
            <h1 class="display-2 mb-4">Sign Up</h1>
            <input class="form-control mt-2" placeholder="Name" type="text" name="name" required/>
            <?php echo $nameErr?>
            <input class="form-control mt-2" placeholder="Phone" type="number" name="phone" required/>
            <?php echo $phoneErr?>
            <input class="form-control mt-2" placeholder="Address" type="text" name="address" required/>
            <?php echo $addressErr?>
            <input class="form-control mt-2" placeholder="Email" type="email" name="email" required/>
            <?php echo $emailErr?>
            <input class="form-control mt-2" placeholder="Password" type="password" name="password" required/>
            <?php echo $passwordErr?>
            <input class="btn btn-primary mt-2" type="submit" value="Sign Up">
        </div>

    </form>
</div>

</body>
</html>

<?php

$connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
if ($connection->connect_error) die($connection->connect_error);

if($regexError ===false && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['email'])){
    add_user($connection, $name, $token, $phone, $address, $email, $isAdmin);
}

function add_user($connection, $na, $pw, $ph, $ad, $em, $iA){
    $query = "INSERT INTO users(name, phone, address, email, password, isAdmin) VALUES('$na', '$ph', '$ad', '$em', '$pw', '$iA')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    if($result){
        echo "<div class='container'>Welcome to the system <b>" .$na . "</b>. You are now able to see all the 
              <a href='products.php'>products</a>.</div>";
        $_SESSION['username'] = "$na";

        $_SESSION['loggedIn'] = true;

    }
}

