<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2</title>
</head>
<body>
  <?php

    $multiplo =1;

    while ($multiplo <= 100) {
      if ($multiplo % 5 == 0) {
        echo $multiplo . "<br>";
      };
      $multiplo++;
    };
  
  ?>
</body>
</html>