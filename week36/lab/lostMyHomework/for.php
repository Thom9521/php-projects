<html>
<head>
    <title>How many times have you lost your homework?</title>
</head>
<body>
<h1>Where is your homework?</h1>
<?php
$howManyTimes = 10;
$aName = "I've";

for ($justACounter = 1; $justACounter <= $howManyTimes; $justACounter++) {
    print "<p>" . $aName . " lost it " . $justACounter . " times.";
    print "</p>";
}
?>
<p>Wait! <?php print $aName?> finally found it!</p>
</body>
</html>
