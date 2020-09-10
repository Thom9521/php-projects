<html>
<body>
<h2>
    Result:
</h2>
<?php
$dice = $_POST["dice"];
$throws = $_POST["throws"];

// initialize distribution
for($i = $dice; $i<=6*$dice; $i++){
    $dist[$i] = 0;
}
// construct distribution
for($t = 0; $t < $throws; $t++){
    $outcome = 0;
    // throw dice
    for($d=0; $d <$dice ; $d++){
        $outcome = $outcome + rand(1,6);
    }
    // increase distribution
    $dist[$outcome]++;
}

// output distribution
for ($i = $dice; $i<=6*$dice; $i++){
    echo "$i: $dist[$i] <br>";
}

?>
</body>
</html>
