<?php
session_start();

if (
  isset($_POST['usuario']) && isset($_POST['password'])
  && isset($_POST['password2'])
) {

  $usuario = strtolower($_POST['usuario']);
  $password = hash('sha512', $_POST['password']);
  $password2 = hash('sha512', $_POST['password2']);


  if ($password == $password2) { //si las pass coinciden
    //comprobamos que el usuario no existe ya en BD
    try {
      $host = "db-web.chhb1lexyp6c.us-east-1.rds.amazonaws.com";
      $dbUsername = "admin";
      $dbPassword = "Root##1234";
      $dbName = "usuarios";
      $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
      $statement->execute(array(':usuario' => $usuario));
      $resultado = $statement->fetch();

      if ($resultado) {
        echo "el usuario ya existe";
      } else {
        //guardo en BD el usuario
        $statement = $conn->prepare('INSERT INTO usuarios(usuario, password) values (:usuario, :password)');
        $statement->execute(
          array(
            ':usuario' => $usuario,
            ':password' => $password
          )
        );
      }

    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    header("Location: login.php?perfecto_ahora_inicia_sesion");
  } else {
    header("Location: registro.php?error=las_contraseñas_no_coinciden");
  }
} else {
  echo 'Rellena los datos correctamente';
}

require '../views/registro.view.php';
?>