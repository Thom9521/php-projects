<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Url Encode Service</title>
</head>
<body>
<h2>Url Encode Service</h2>
The encoded string is <?php
$text = $_GET["text"];
echo(urlencode($text)); ?>
<p><a href="urlencode.html">Encode another string</a></p>
</body>
</html>