<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>

  <link rel="stylesheet" type="text/css" href="../css/registro.style.css">
  <link rel="icon" href="../img/tesla.png" type="image/x-icon">

</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">

    <h2>Regístrate</h2>

    <br>

    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="password" placeholder="Contraseña">
    <input type="password" name="password2" placeholder="Repite la contraseña">
    <br><br>
    <input type="submit" value="Aceptar">

    <p>¿Tienes cuenta? <a href="login.php">Inicia sesión</a></p>

  </form>



</body>

</html>