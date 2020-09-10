<!DOCTYPE HTML>
<html>
<head>
    <title>Which month?</title>
</head>
<body>
<h1>Which month?</h1>
<p>
    <?php
    date_default_timezone_set('Europe/Copenhagen');

    // Thirty days has September, April, June and November. All the rest have 31, except February which has 28
    // $daysInMonth = date("t"); Gives the number of days in the current month
    $daysInMonth = 28;
    if ($daysInMonth < 31 && $daysInMonth != 28) {
        print "This month must be February, September, April, June or November";
    }
    else if ($daysInMonth == 28){
        print "This month must be February";
    }
    else if($daysInMonth >= 31 ){
        print "This month must be January, March, May, July, August, October or December";
    }
    ?>
</p>
</body>
</html>