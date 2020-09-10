<html>
<head>
    <title>How many times have you lost your homework?</title>
</head>
<body>
<h1>Where is your homework?</h1>
<?php
$howManyTimes = 10;
$justACounter = 1;
$aName = "I've";

do {
    print "<p>" . $aName . " lost it " . $justACounter . " times.";
    print "</p>";
    $justACounter = $justACounter + 1 ;
} while ($justACounter <= $howManyTimes)
?>
<p>Wait! <?php print $aName?> finally found it!</p>
</body>
</html>
<?php
