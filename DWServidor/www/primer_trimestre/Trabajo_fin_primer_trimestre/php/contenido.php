<?php
session_start();

if (isset($_SESSION['usuario']) && isset($_SESSION['idUsuario'])) {
  require '../views/contenido.view.php';
} else {
  header('Location: ../index.html');
}

?>