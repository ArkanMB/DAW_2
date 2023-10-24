<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiplicacion</title>
</head>
<body>
  <?php 

    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];
    $multiplicacion = $numero1 * $numero2;

    echo
    "<h1>La multiplicacion de " . $numero1 . " y " . $numero2 . 
    " es " . $multiplicacion . "</h1>"; 

    // OTRA FORMA ==>
    // $multiplicacion = $_GET['numero1'] * $_GET['numero2'];
    // echo
    // "<h1>La multiplicacion de " . $_GET['numero1'] . " y " . $_GET['numero2'] . 
    // " es " . $multiplicacion . "</h1>"; 
    

  ?>
</body>
</html>