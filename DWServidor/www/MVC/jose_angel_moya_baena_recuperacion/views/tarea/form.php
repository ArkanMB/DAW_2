<?php

extract($data);
if (isset($tarea)) {
  echo "<h1>Modificación de tareas</h1>";
} else {
  echo "<h1>Inserción de tareas</h1>";
}

$idTarea = $tarea->id ?? "";
$titulo = $tarea->titulo ?? "";
$descripcion = $tarea->descripcion ?? "";

echo "<form action = 'index.php' method = 'post'>
        <input type='hidden' name='idTarea' value='" . $idTarea . "'>
        Título:<input type='text' name='titulo' value='" . $titulo . "'><br>
        Descripcion:<input type='text' name='descripcion' value='" . $descripcion . "'><br>";

if (isset($tarea)) {
  echo "  <input type='hidden' name='action' value='modificarTarea'>";
} else {
  echo "  <input type='hidden' name='action' value='insertarTarea'>";
}
echo "	<input type='submit' value='Enviar'>
      </form>";
echo "<p><a href='index.php'>Volver</a></p>";
