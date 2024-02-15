<form action="./index.php" method="POST" name="registro">

  <h2>Regístrate</h2>

  <br>

  <input type="text" name="usuario" placeholder="Usuario" maxlength="20" required>
  <input type="password" name="password" placeholder="Contraseña" maxlength="16" required>
  <input type="password" name="password2" placeholder="Repite la contraseña" maxlength="16" required>
  <br><br>
  <input type="hidden" name="action" value="registrarUsuario">
  <input type="submit" value="Aceptar">

  <p>¿Tienes cuenta? <a href="index.php?action=loginUsuario">Inicia sesión</a></p>

</form>