<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['password'])) {

  $usuario = strtolower($_POST['usuario']);
  $password = hash('sha512', $_POST['password']);

  try {

    $host = "db-web.chhb1lexyp6c.us-east-1.rds.amazonaws.com";
    $dbUsername = "root";
    $dbPassword = "root1234";
    $dbName = "usuarios";
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
    $statement->execute(array(':usuario' => $usuario, ':password' => $password));
    $resultado = $statement->fetch();

  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  ;

  if ($resultado) {
    $_SESSION['usuario'] = $usuario;
    header("Location: contenido.php");
  } else {
    header("Location: registro.php?error=algo_has_puesto_mal");
  }
}


require '../views/login.view.php';

?>