<?php
session_start();

if (isset($_POST['editarTitulo']) && isset($_POST['editarDescripcion']) && isset($_POST['idTarea']) && isset($_SESSION['idUsuario'])) {

  // VARIABLES
  $titulo = $_POST['editarTitulo'];
  $descripcion = $_POST['editarDescripcion'];
  $idTarea = $_POST['idTarea'];
  $idUsuario = $_SESSION['idUsuario'];

  try {

    include '../include/config.db.php';

    $sql = "SELECT * FROM usuarios_tarea WHERE tarea = ? AND usuario = ?";
    $selectStatement = $conn->prepare($sql);
    $selectStatement->bind_param('ii', $idTarea, $idUsuario);
    $selectStatement->execute();
    $result = $selectStatement->get_result();

    if ($result->num_rows > 0) {

      $updateStatement = $conn->prepare("UPDATE tarea SET titulo = ?, descripcion = ? WHERE id = ?");
      $updateStatement->bind_param('ssi', $titulo, $descripcion, $idTarea);
      $updateStatement->execute() or die($updateStatement->error);
      $updateStatement->close();

    } else {

      header('Location: contenido.php?error=la_tarea_no_pertenece_al_usuario');

    }

    $selectStatement->close();
    $conn->close();

  } catch (Exception $e) {

    echo $e->getMessage();

  }

  header("Location: contenido.php");

}

require '../views/editarTarea.view.php';
