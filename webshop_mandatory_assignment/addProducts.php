<html>
<head>
    <title>Add products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <!--Navbar-->
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
                <li class="nav-item active">
                    <a class="nav-link" href="addProducts.php">Manage Products</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!--Checks if the user is logged in-->
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
    // Checks if the user is an admin
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) {

        echo '<form action = "addProducts.php" method = "post" >
        <div class="container" >
            <h1 class="display-2 mb-4" > Add Products </h1 >
            <input class="form-control" placeholder = "Name" type = "text" name = "name" required />
            <br />
            <input class="form-control" placeholder = "Price" type = "number" name = "price" required />
            <br />
            <input class="form-control" placeholder = "Image path" type = "text" name = "imagePath" required />
            <br />
            <input class="form-control" placeholder = "Description" type = "text" name = "description" required />
            <br />
             <select class="form-control" name = "category" required>
                <option value="" selected disabled>Category</option>';
     //Connection to the database
    $connection =
    new mysqli('localhost', 'root', '', 'phpclasses');
    if ($connection->connect_error) die($connection->connect_error);

    // Get the categories without a parent
    $categoryQuery ="SELECT * FROM categories WHERE parent_id != 0";
    $categoryResult = $connection->query($categoryQuery);
    if (!$categoryResult) die($connection->error);
    elseif ($categoryResult->num_rows) {
        //Fetching each row with the associated field name
        while($categoryRow = $categoryResult -> fetch_assoc()){
            echo '<option value='.$categoryRow["name"].'>'.$categoryRow["name"].'</option>';
        }
    }

        echo '            
             </select>
            <br />
            <input class="btn btn-primary" type = "submit" value = "Add to database" >
        </div >

    </form >';
    }
     ?>
</div>

</body>
</html>

<?php

if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){

    // ADDING PRODUCTS TO DATABASE
    $connection =
        new mysqli('localhost', 'root', '', 'phpclasses');
    if ($connection->connect_error) die($connection->connect_error);

    //Checking if the post values are set
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['price'])){
        $price = $_POST['price'];
    }
    if(isset($_POST['imagePath'])){
        $imagePath = $_POST['imagePath'];
    }
    if(isset($_POST['description'])){
        $description = $_POST['description'];
    }
    if(isset($_POST['category'])){
        $category = $_POST['category'];
    }

    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['imagePath']) && isset($_POST['description']) ){

    function addNewProduct($connection, $na, $pr, $im, $de, $ca) {
        $query = "INSERT INTO products(name, price, imagePath, description, category) VALUES('$na', '$pr', '$im', '$de', '$ca')";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
        if($result){
            echo "<div class='container'>The new product has been added to the products table.</div>";
        }
        else{echo "Something went wrong...";}
    }

        addNewProduct($connection, $name, $price, $imagePath, $description, $category);

    }

// UPDATING PRODUCT
    if (isset($_REQUEST['subject'])){
        $subject = $_REQUEST['subject'];
    }
    if(isset($subject)) {
        //Using switch to check if the form request is to save or delete a product
        switch ($subject) {

            case 'Save':

                if (isset($_POST['newID'])) {
                    $newID = $_POST['newID'];
                }
                if (isset($_POST['newName'])) {
                    $newName = $_POST['newName'];
                }
                if (isset($_POST['newPrice'])) {
                    $newPrice = $_POST['newPrice'];
                }
                if (isset($_POST['newImagePath'])) {
                    $newImagePath = $_POST['newImagePath'];
                }
                if (isset($_POST['newDescription'])) {
                    $newDescription = $_POST['newDescription'];
                }
                if (isset($_POST['newCategory'])) {
                    $newCategory = $_POST['newCategory'];
                }

                if (isset($_POST['newName']) && isset($_POST['newPrice']) && isset($_POST['newImagePath']) && isset($_POST['newDescription'])) {

                    function editProduct($connection, $na, $pr, $im, $de, $ca, $id)
                    {
                        $query = "UPDATE products SET name='$na', price='$pr', imagePath='$im', description='$de', category='$ca' WHERE ID='$id'";
                        $result = $connection->query($query);
                        if (!$result) die($connection->error);
                        if ($result) {
                            echo "<div class='container'>The product has been saved.</div>";
                            header("LOCATION: addProducts.php");

                        } else {
                            echo "Something went wrong...";
                        }
                    }
                    editProduct($connection, $newName, $newPrice, $newImagePath, $newDescription, $newCategory, $newID);
                }
                break;

            case 'Delete':

                if (isset($_POST['newID'])) {
                    $newID = $_POST['newID'];
                }

                function deleteProduct($connection, $id)
                {
                    $query = "DELETE FROM products WHERE ID='$id'";
                    $result = $connection->query($query);
                    if (!$result) die($connection->error);
                    if ($result) {
                        echo "<div class='container'>The product has been deleted.</div>";
                        header("LOCATION: addProducts.php");

                    } else {
                        echo "Something went wrong...";
                    }
                }
                deleteProduct($connection, $newID);
                break;
        }
    }


//GETTING PRODUCTS FROM DATABASE

// Connect to the database:
    $dbc = mysqli_connect('localhost', 'root', '', 'phpclasses');
    if (!$dbc) {
        echo "Something went wrong with the connection...";
    }

    $productQuery ="SELECT * FROM products";
    $productResult = $dbc->query($productQuery);
    if (!$productResult) die($dbc->error);
    elseif ($productResult->num_rows) {

        echo "<div class='container'><h2>Products:</h2></div>";
        echo '<div class="container">
                    <div class="row">';
        // Adding a card for each product in the database
        while($productRow = $productResult -> fetch_assoc()){
            echo'
                    <div class="col-sm-4">
                    <form action = "addProducts.php" method = "post" >
                    <div class="card">
                      <div class="card-body">
                       <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                      </div>
                      <input type="text" class="form-control" value="'.$productRow["ID"].'" name="newID">
                    </div>
                      <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                      </div>
                      <input type="text" class="form-control" value="'.$productRow["name"].'" name="newName">
                    </div>
                     <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Price</span>
                      </div>
                      <input type="text" class="form-control" value="'.$productRow["price"].'" name="newPrice">
                    </div>
                     <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Image path</span>
                      </div>
                      <input type="text" class="form-control" value="'.$productRow["imagePath"].'" name="newImagePath">
                    </div>
                     <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Description</span>
                      </div>
                      <input type="text" class="form-control" value="'.$productRow["description"].'" name="newDescription">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Category</span>
                      </div>
                      <select class="form-control" name = "newCategory" required>
                        <option value='.$productRow["category"].'>'.$productRow["category"].'</option>';

            // Get the categories without a parent
            $categoryResult = $connection->query($categoryQuery);
            if (!$categoryResult) die($connection->error);
            elseif ($categoryResult->num_rows) {
                while($categoryRow = $categoryResult -> fetch_assoc()){
                    echo '<option value='.$categoryRow["name"].'>'.$categoryRow["name"].'</option>';
                }
            }
            echo '            
                          </select> 
                       </div>
                        <input class="btn btn-primary" name="subject" type="submit" value="Save"/>
                        <input class="btn btn-danger" name="subject" type="submit" value="Delete"/>
                      </div>
                    </div>
                    </form>
                    </div>
                     ';
        }
        echo'
                    </div>
                   </div>
                   </form >';


    }else{
        echo "There are no products in the database";
    }
}
else{
    echo "<div class='container'><p class='display-2 mb-4'>Restricted Area: requires authentication</p></div>";
}

