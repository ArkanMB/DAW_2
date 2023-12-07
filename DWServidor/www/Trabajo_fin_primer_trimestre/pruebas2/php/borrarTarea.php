<?php
session_start();

include("../include/config.db.php");

if(isset($_POST['idTarea']) && isset($_SESSION['idUsuario'])) {

  $idTarea = $_POST['idTarea'];
  $idUsuario = $_SESSION['idUsuario'];


  if($conn->query("SELECT * FROM `usuarios_tarea` WHERE `tarea` = '$idTarea' AND `usuario` = '$idUsuario'")) {

    //si falla aparte
    $elimimar = $conn->query(
      "DELETE FROM `usuarios_tarea` WHERE `tarea` = '$idTarea';
       DELETE FROM `tarea` WHERE id = '$idTarea';"
    ) or die($conn->error);

    header("Location: contenido.php");

  }

} else {

  header("Location: ../index.html");
}

?>