<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
  <!-- Escribe un programa que calcule el salario semanal de un trabajador 
  teniendo en cuenta que las horas ordinarias (40 primeras horas de trabajo) 
  se pagan a 12 euros la hora. A partir de la hora 41, se pagan a 16 euros
  la hora. -->
</head>

<body>
  <?php

  define('HORAS_NORMALES', 40);

  $horas = $_POST['horas'];

  if ($horas <= HORAS_NORMALES) {
    $salario = $horas * 12;
    echo '<h2>Tu salario es de ' . $salario . ' euros esta semana</h2>';
  } else {
    $salario = ($horas * 12) + (($horas - 40) * 16);
    echo '<h2>Tu salario es de ' . $salario . ' euros esta semana ya que has hecho ' . ($horas - 40) . ' hora/s extra/s</h2>';
  };

  ?>
</body>

</html>