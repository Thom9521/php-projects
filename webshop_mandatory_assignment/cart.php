<html>
    <head>
        <title>Cart</title>
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
        <h2 class="display-2 mb-4">Cart</h2>
    </div>

    </body>
</html>


<?php
//print_r($_SESSION['cart']);

$whereIn = implode(',', $_SESSION['cart']);

$totalPrice = 0;
$numberInTable = 0;

// Connect to the database:
$dbc = mysqli_connect('localhost', 'root', '', 'phpclasses');
if (!$dbc) {
    echo "Something went wrong with the connection...";
}

$productQuery = "SELECT * FROM products WHERE id IN ($whereIn)";

$productResult = $dbc->query($productQuery);
if (!$productResult) {echo "<div class='container'>No products in the cart.</div>";}
elseif ($productResult->num_rows) {
/*
    echo "<div class='container'>
            </div>
                </div>";
    echo '<div class="container">
                    <div class="row">';
    while($productRow = $productResult -> fetch_assoc()){

// counts how many times a specific values appears in the array
        $arrayCount = array_count_values($_SESSION['cart']);
        $cnt = $arrayCount[$productRow['ID']];

        $totalPrice += (int)$productRow['price']* $cnt;

        echo'
                   <div class="col-sm-4">
                    <div class="card">
                      <img class="card-img-top" src='.$productRow["imagePath"].' style="max-height: 15rem" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">'.$productRow["name"].'</h5>
                        <h5 class="card-title text-success">'.$productRow["price"].'$</h5>
                        <p class="card-text">'.$productRow["description"].'</p>
                        <p class="card-text">Amount: <b>'.$cnt.'</b></p>
                      </div>
                    </div>
                   </div>

                   ';

    }*/

    echo "<div class='container'>
            </div>
                </div>";
    echo '<div class="container">
           <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Amount</th>
      <th scope="col">Price for all</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  

';
    while($productRow = $productResult -> fetch_assoc()){

// counts how many times a specific values appears in the array
        $arrayCount = array_count_values($_SESSION['cart']);
        $cnt = $arrayCount[$productRow['ID']];

        $totalPrice += (int)$productRow['price']* $cnt;
$numberInTable++;

        echo'
             <tr>
      <th scope="row">'.$numberInTable.'</th>
      <td>'.$productRow["name"].'</td>
      <td><img src='.$productRow["imagePath"].' style="max-height: 1.7rem" alt="Card image cap"></td>
      <td>'.$productRow["price"].' $</td>
      <td>'.$cnt.'</td>

      <td>'.$productRow["price"] * $cnt.' $</td>
      <td></td>
    </tr>
                   
                   ';

    }
    echo'            
  </tbody>
</table>
                    <h3 class="mt-5">Total price: '.$totalPrice.' $</h3>
                    </div>
                   </div>';


}else{
    echo "There are no products in the database";
}



