<form action="index.php" method="POST" name="login">

  <h2>Inicia sesión</h2>

  <br>

  <input type="text" name="usuario" placeholder="Usuario" maxlength="20" required>
  <input type="password" name="password" placeholder="Password" maxlength="16" required>
  <br><br>
  <input type='hidden' name='action' value='loginUsuario'>
  <input type="submit" value="Aceptar">
  <p>¿No tienes cuenta? <a href="./index.php?action=registrarUsuario">Regístrate</a></p>

</form>