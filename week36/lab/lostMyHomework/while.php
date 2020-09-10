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

//uncomment and run ONLY if you know what the follwoing code is doing
//You are warned! If you want to  take the  risk ? be my guest :)

    while ($justACounter <= $howManyTimes) {
        --$howManyTimes;
        $justACounter++;
        print "<p>" . $aName . " lost it " . $justACounter . " times.";
        print "</p>";
    }
?>
<p>Wait! <?php print $aName?> finally found it!</p>
</body>
</html>