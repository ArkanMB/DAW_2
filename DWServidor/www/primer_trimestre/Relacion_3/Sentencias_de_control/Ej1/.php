<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php</title>
</head>
<body>
  <?php 

    $horario = array(
      "El Lune tienes DWCliente", 
      "El Martes tienes DWCliente", 
      "El Miercoles tienes DWServidor", 
      "El Jueves tienes DWServidor", 
      "El Viernes tienes DiseñoW"
    );

    if($_GET['dia']<5 && $_GET['dia']>=0){

          
        echo $horario[$_GET['dia']];

      }else {
      echo "<h2>Algo has hecho mal</h2>";
    };

    
    
  
  ?>
</body>
</html>