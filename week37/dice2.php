<html>
<body>
<h2>Results</h2>
<?php
$dice = $_POST["dice"];
$throws = $_POST["throws"];
$max = 0;

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
// find the number of occurences for the most occuring outcome
for($i = $dice; $i <= 6*$dice; $i++){
    if($dist[$i] > $max){
        $max=$dist[$i];
    }
}
// output distribution
for ($i=$dice; $i <= 6*$dice; $i++){
    $width = (100*$dist[$i]) / $max;
    echo"<table width = '$width%' bgcolor ='red'>
           <tr><td>$i: $dist[$i]</td></tr> </table>";

}
?>
</body>
</html>
