<?php
session_start();

include("../include/config.db.php");

if (isset($_POST['idTarea'], $_SESSION['idUsuario'])) {

  $idTarea = $_POST['idTarea'];
  $idUsuario = $_SESSION['idUsuario'];

  try {

    $statement = $conn->prepare("SELECT * FROM `usuarios_tarea` WHERE `tarea` = ? AND `usuario` = ?");
    $statement->bind_param('ii', $idTarea, $idUsuario);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {

      $deleteStatement = $conn->prepare("DELETE FROM `usuarios_tarea` WHERE `tarea` = ?");
      $deleteStatement->bind_param('i', $idTarea);

      if ($deleteStatement->execute()) {

        $deleteStatementTarea = $conn->prepare("DELETE FROM `tarea` WHERE id = ?");
        $deleteStatementTarea->bind_param('i', $idTarea);

        if ($deleteStatementTarea->execute()) {
          header("Location: contenido.php");
        } else {
          header("Location: contenido.php?error=no_se_ha_borrado_la_tarea");
        }

        $deleteStatementTarea->close();

      } else {

        header("Location: contenido.php?error=no_se_ha_borrado_en_usuarios_tarea");

      }

      $deleteStatement->close();

    } else {

      header("Location: contenido.php?error=Tarea_no_pertenece_a_usuario");
    }

    $statement->close();
    $conn->close();

  } catch (Exception $e) {

    //echo "Error: " . $e->getMessage();

  }

} else {

  header("Location: ../index.html");
}


?>