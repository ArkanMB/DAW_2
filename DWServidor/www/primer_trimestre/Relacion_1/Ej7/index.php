<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio7</title>
</head>
<body>
  
  <?php 
  
    $datos = array(
      "Nombre: " => "Jose Angel",
      "Direccion: " => "Calle Ortega y Gasset",
      "Telf: " => "618733345" 
    );

    foreach ($datos as $tipo => $dato) {
      echo "<ul><li>" . $tipo . $dato . "</li></ul>";
    }

  ?>

</body>
</html>