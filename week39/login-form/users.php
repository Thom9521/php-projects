<?php
session_start();

// Connect to the database:
$dbc = mysqli_connect('localhost', 'root', '', 'phpclasses');
if(!$dbc){
    echo"Something went wrong with the connection...";
}

$name = $_POST['name'];
$password = $_POST['password'];

$query="SELECT * FROM users WHERE name = '$name'";
$result = $dbc->query($query);
if($name != "" && $password!= "") {
    if (!$result) die($dbc->error);
    elseif ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();

        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$password$salt2");

        if ($token == $row[2]) {
            echo "Welcome $row[1]. Your ID is $row[0]";
            echo "<br/>";
            echo "<a href='products.php'>Show Products</a>";

            $_SESSION['loggedIn'] = true;


        } else die("Invalid credentials");
    } else die("Invalid credentials");
}
else {
    die ("Please fill in the fields");
}

echo " <p>
        <a href='login.php'>Go back</a>
    </p>";
$dbc->close();
