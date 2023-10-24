<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio5</title>
</head>
<body>

  <table border=1>

    <tr>
      <th>OPERACION</th>
      <th>X</th>
      <th>Y</th>
      <th>RESULTADO</th>
    </tr>

  <?php 

    $x = 144;
    $y = 999;

    $calculos = array(
      "SUMA" => array($x, $y, $x+$y),
      "RESTA" => array($x, $y, $x-$y),
      "MULTIPLICACION" => array($x, $y, $x*$y),
      "DIVISION" => array($x, $y, $x/$y)
    );

    foreach ($calculos as $calculo => $variables) {
      echo "<tr><th>" . $calculo . "</th>";
      foreach ($variables as $variable) {
        echo "<td>" . $variable . "</td>";
      }
      echo "</tr>";
    }
  ?>

  </table>
  
</body>
</html>