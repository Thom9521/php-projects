<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<form action="users.php" method="post">
    <div class="container">
    <h1 class="display-2 mb-4">Login</h1>
    <input class="form-control" placeholder="Name" type="text" name="name" />
    <br/>
    <input class="form-control" placeholder="Password" type="password" name="password"/>
    <br/>
    <input class="btn btn-primary" type="submit" value="Login">
    </div>

</form>
</body>
</html>
<?php
session_start();
session_destroy();
?>
