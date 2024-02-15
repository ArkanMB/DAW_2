<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1</title>
</head>

<body>

  <h3>Vamos a mostrar los números del 1 al 100</h3>
  <h4>Condiciones:</h4>
  <ul>
    <li>Si el número es múltiplo de 3 se pintar "Fizz" en lugar del número</li>
    <br>
    <li>Si es múltiplo de 5 se pintar "Buzz" en lugar del número</li>
    <br>
    <li>Si es múltiplo de 3 y 5 se pinta FizzBuzz</li>
    <br>
  </ul>

  <?php

  for ($i = 1; $i <= 100; $i++) {

    if ($i % 3 == 0 && $i % 5 == 0) {
      echo "FizzBuzz";
    } else if ($i % 3 == 0) {
      echo "Fizz";
    } else if ($i % 5 == 0) {
      echo "Buzz";
    } else {
      echo $i;
    }
    echo "<br>";
  }

  ?>

</body>

</html>