<html>
  <body>
  <h2>Result</h2>

  <?php
    $name = $_POST["name"];
    $photo["David"] = "https://i.imgur.com/MlVvOhl.jpg";
    $photo["Arne"] = "https://i.imgur.com/YJnSyYk.jpg";
    $photo["Niels"] = "https://i.imgur.com/MHRvcna.jpg";

    if(!array_key_exists($name, $photo)){
        echo "No photo of $name :(";
    } else{
        echo"<h3>Photo of $name </h3>
                <img width='300' src='$photo[$name]'/>";
    }
  ?>
  <p><a href="photo.html"> New Search? </a>

  </body>
</html>
