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

  $hora = floatval($_GET['hora']);

  if ($hora >= 6.00 && $hora <= 12.00) {
    echo 'Buenos días';
  } elseif ($hora <= 20.00) {
    echo 'Buenas tardes';
  } elseif ($hora < 24.00) {
    echo 'Buenas noches';
  }else{
    echo 'Deberías estar durmiendo';
  };
  
  

  ?>
</body>

</html>