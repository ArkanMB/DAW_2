<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 4</title>
</head>
<body>

  <?php

    $posicion = 1;

    for ($contador=320; $contador > 160 ; $contador = $contador - 20) { 

      echo $posicion++ . " => " . $contador . "<br>";

    };
  
  ?>
  
</body>
</html>