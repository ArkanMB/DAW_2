<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 3</title>
</head>

<body>

  <h4>Vamos a mostrar los números primos entre 1 y el número que has introducido</h4>

  <?php

  include('funciones.php');

  $numero = abs($_POST['numeroIntroducido']);
  $primos = array();
  $indice = 0;
  if ($numero < 1 || $numero > 1000 || is_null($numero)) {
    echo "<h3>Has puesto algo de lo que te he dicho que no se puede poner...</h3>  
          <a href='../index.php'>Vuelve a intentarlo (pero esta vez hazme caso y lee bien la condición)</a>";
  } else {
    for ($indice = 2; $indice <= $numero; $indice++) {
      if (esPrimo($indice)) {
        $primos[] = $indice;
      }
    }

    foreach ($primos as $primo) {
      echo $primo . " ";
    }
  }

  ?>

</body>

</html>