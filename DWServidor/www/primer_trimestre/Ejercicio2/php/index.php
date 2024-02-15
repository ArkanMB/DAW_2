<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2</title>
</head>
<body>

  <h4>Array asociativo con mi horario</h4>

  <table border=1>
  
  <tr style = "color:blue">
    <th style = "color:red">HORAS</th>
    <th>LUNES</th>
    <th>MARTES</th>
    <th>MIERCOLES</th>
    <th>JUEVES</th>
    <th>VIERNES</th>
  </tr>

  <?php 

    $horario = array(
      "15.15" => array("DWCliente", "DWCliente", "DWServidor", "DWServidor", "DiseñoW"),
      "16.15" => array("DWCliente", "DWCliente", "DWServidor", "DWServidor", "DiseñoW"),
      "17.15" => array("DWCliente", "DWCliente", "DiseñoW", "DWServidor", "DiseñoW"),
      "18.15" => array("RECREO", "RECREO", "RECREO", "RECREO", "RECREO"),
      "19.30" => array("DWServidor", "DespliegueAppW", "DiseñoW", "Empresa", "Python"),
      "20.30" => array("DWServidor", "DespliegueAppW", "DiseñoW", "Empresa", "Python"),
      "21.30" => array("DWServidor", "DespliegueAppW", "Empresa", "Empresa", "Python")
    );

    foreach ($horario as $horas => $asignaturas) {
      echo "<tr><td>" . $horas . "</td>";
      foreach ($asignaturas as $asignatura) {
        echo "<td>" . $asignatura . "</td>";
      }
      echo "</tr>";
    }
  
  ?>
  
  </table>

</body>
</html>