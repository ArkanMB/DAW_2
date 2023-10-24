<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dados</title>
</head>
<body>
  <?php
  
    $img1 = rand(1,6);
    $img2 = rand(1,6);
    $suma = $img1 + $img2;

    $imagenes = array(
      1 => '<img src="./img/1.svg">',
      2 => '<img src="./img/2.svg">',
      3 => '<img src="./img/3.svg">',
      4 => '<img src="./img/4.svg">',
      5 => '<img src="./img/5.svg">',
      6 => '<img src="./img/6.svg">' 
    );

    echo $imagenes[$img1] . $imagenes[$img2];

    echo "<br>" . "La suma de los dados son " . $suma;
  
  ?>
</body>
</html>