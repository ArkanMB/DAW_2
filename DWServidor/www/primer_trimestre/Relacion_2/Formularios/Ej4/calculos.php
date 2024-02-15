<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculos</title>
</head>
<body>
  <?php

    echo "<h2>Calculos</h2>";

    $suma = $_GET['number1'] + $_GET['number2'];
    $resta = $_GET['number1'] - $_GET['number2'];
    $multiplicacion = $_GET['number1'] * $_GET['number2'];
    $division = $_GET['number1'] / $_GET['number2'];

    echo 
    "<ul><li>La suma de " . $_GET['number1'] . " y " . $_GET['number2'] . 
    " es = " . $suma . 
    "</li><li>La resta de " . $_GET['number1'] . " y " . $_GET['number2'] . 
    " es = " . $resta . 
    "</li><li>La multiplicación de " . $_GET['number1'] . " y " . $_GET['number2'] . 
    " es = " . $multiplicacion . 
    "</li><li>La división de " . $_GET['number1'] . " y " . $_GET['number2'] . 
    " es = " . $division . "</li></ul>";

  ?>
</body>
</html>