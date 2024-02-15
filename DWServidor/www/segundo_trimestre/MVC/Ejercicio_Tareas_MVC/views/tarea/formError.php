<?php

extract($data);
if (isset($tarea)) {
  echo "<h1>La modificación de tareas ha fallado</h1>";
} else {
  echo "<h1>La inserción de tareas ha fallado</h1>";
}
