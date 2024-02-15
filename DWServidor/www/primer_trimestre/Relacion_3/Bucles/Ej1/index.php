<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1</title>
</head>

<body>
  <?php

    for ($multiplo = 0; $multiplo <= 100; $multiplo++) {
      if ($multiplo % 5 == 0){
        echo $multiplo . "<br>";
      };
    };

  ?>
</body>

</html>