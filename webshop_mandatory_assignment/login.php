<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
                    <a class="nav-link" href="addProducts.php">Manage Products</a>
                </li>
            </ul>
        </div>
    </nav>
    <form action="login.php" method="post">
        <div class="container">
            <h1 class="display-2 mb-4">Login</h1>
            <input class="form-control mt-2" placeholder="Email" type="email" name="email" required/>
            <input class="form-control mt-2" placeholder="Password" type="password" name="password" required/>
            <input class="btn btn-primary mt-2" type="submit" value="Login">
        </div>

    </form>
    <p>Need an account? <a href="signup.php">Create one here.</a></p>


</div>

</body>
</html>

<?php

// Connect to the database:
$dbc = mysqli_connect('localhost', 'root', '', 'phpclasses');
if(!$dbc){
    echo"Something went wrong with the connection...";
}

if(isset($_POST['email'])){
    $email = $_POST['email'];

}
if(isset($_POST['password'])){
    $password = $_POST['password'];

}

if(isset($_POST['email']) && isset($_POST['password'])) {
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $dbc->query($query);
    if (!$result) die($dbc->error);
    if ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();

        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$password$salt2");

        if ($token == $row[5]) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = "$row[1]";
            header("LOCATION: index.php");

            if($row[6]=== "0"){
                echo "Welcome $row[1]. Your ID is $row[0]";
            }
            if($row[6] === "1"){
                echo "Welcome your almighty admin $row[1].";
                $_SESSION['admin'] = true;
            }


        } else die("Invalid credentials");
    } else die("Invalid credentials");
}

$dbc->close();
