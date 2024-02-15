<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salario</title>
</head>
<body>
  <?php
  
    define('COBRO_HH',12);
    $salario = $_POST['horas'] * COBRO_HH;

    echo 
    "<h2>Usted cobra la hora " . COBRO_HH . 
    " euros y a hecho " . $_POST['horas'] . 
    " horas esta semana entonces vas a cobrar: " . 
    $salario . " euros</h2>";
  
  ?>
</body>
</html> 