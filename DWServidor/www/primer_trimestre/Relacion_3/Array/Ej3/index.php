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

  $numero = array_fill(0, 15, 0);

  for ($i = 0; $i < 15; $i++) {
    $numero[$i] = rand(1, 15);
  }

  echo "Array original: " . "<br>";

  for ($i = 0; $i < 15; $i++) {
    echo " - " . $numero[$i];
  }

  $aux = $numero[14];
  for ($i = 14; $i > 0; $i--) {
    $numero[$i] = $numero[$i - 1];
  }

  $numero[0] = $aux;

  echo "<br><br>" . "Array rotado a al derecha una posición: " . "<br>";

  for ($i = 0; $i < 15; $i++) {
    echo " - " . $numero[$i];
  }

  ?>

</body>

</html>