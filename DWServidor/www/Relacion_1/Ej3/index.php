<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejecicio3</title>
</head>
<body>
  
  <table border=1>
    <tr>
      <th style="color:red">ESPAÑOL</th>
      <th style="color:blue">INGLES</th>
    </tr>

  <?php 
  
    $palabras = array(
      "hola" => "hello",
      "coche" => "car",
      "movil" => "movile",
      "camion" => "truck",
      "puerta" => "door",
      "suelo" => "floor",
      "silla" => "chair",
      "tele" => "TV",
      "mesa" => "table",
      "telefono" => "phone"
    );

    foreach ($palabras as $español => $ingles) {
      echo "<tr><td>" . $español . "</td><td>" . $ingles . "</td></tr>";
    }

  ?>

  </table>

</body>
</html>