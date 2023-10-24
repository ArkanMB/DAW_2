<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1</title>
</head>

<body>

  <?php
  //Definimos el array
  $datos = array(
    'numero' => array(),
    'cuadrado' => array(),
    'cubo' => array()
  );

  //Generamos 20 número aleatorios del 1 al 100
  for ($i = 0; $i < 20; $i++) {
    $numero = rand(1, 100);
    $cuadrado = $numero ** 2;
    $cubo = $numero ** 3;

    //Almacenamos los valores en el array
    $datos['numero'][$i] = $numero;
    $datos['cuadrado'][$i] = $cuadrado;
    $datos['cubo'][$i] = $cubo;
  }
 

  echo '<table border="1">
          <tr><th>Número</th><th>Cuadrado</th><th>Cubo</th></tr>';

  for ($i = 0; $i < 20; $i++){
    echo '<tr>';
    echo '<td>' . $datos['numero'][$i] . '</td>';
    echo '<td>' . $datos['cuadrado'][$i] . '</td>';
    echo '<td>' . $datos['cubo'][$i] . '</td>';
    echo '</tr>';
  }

  echo '</table>';



  ?>

</body>

</html>