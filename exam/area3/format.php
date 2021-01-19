<html>
    <head>
        <title>Text Formatting</title>
    </head>
    <body>
        <h2>Text Formatting: result</h2>
    <?php
    $face = $_POST['face'];
    $text = $_POST['text'];
    $color = $_POST['color'];
    if($face != "normal"){
        $text ="<$face>$text<$face/>";
    }
    echo "<font color='$color'>$text</font>"
    ?>
        <p><a href="format.html">Try again?</a></p>

    </body>
</html>
<?php
