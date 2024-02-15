<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
</head>

<body>
  <?php

  $numero = floatval($_POST['numero']);

  switch ($numero) {

    case '1':
      echo 'Lunes';
      break;

    case '2':
      echo 'Martes';
      break;

    case '3':
      echo 'Miercoles';
      break;

    case '4':
      echo 'Jueves';
      break;

    case '5':
      echo 'Viernes';
      break;

    case '6':
      echo 'Sabado';
      break;

    case '7':
      echo 'Domingo';
      break;

    default:
      echo 'No has escrito el número correcto';
      break;
  }

  ?>
</body>

</html>