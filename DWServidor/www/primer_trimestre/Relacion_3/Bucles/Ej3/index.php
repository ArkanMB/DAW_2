<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 3</title>
</head>
<body>
  
  <?php

    $numero = 1;
    $multiplo = 1;

    do {
      if ($multiplo % 5 == 0 ) {
        echo $numero . ' => ' . $multiplo . "<br>";
        $numero++;
      };
      $multiplo++;
    } while ($multiplo <= 100);
  
  ?>

</body>
</html>