<?php
session_start();
include_once("./models/ModelTarea.php");
include_once("./models/ModelUsuario.php");
include_once("ViewController.php");

class TablonController
{
  private $tarea, $usuarios;

  public function __construct()
  {
    $this->tarea = new ModelTarea();
    $this->usuarios = new ModelUsuario();
  }


  public function mostrarListaTareas()
  {
    if (isset($_SESSION['usuario']) && isset($_SESSION['idUsuario'])) {
      $data["listaTareas"] = $this->tarea->obtenerTareasUsuario($_SESSION['idUsuario']);
      View::render("tarea/all", $data);
    } else {
      $this->loginUsuario();
    }
  }


  public function formularioInsertarTareas()
  {
    $data = array();
    View::render("tarea/form", $data);
  }

  public function insertarTarea()
  {
    if (isset($_REQUEST['titulo']) && isset($_REQUEST['descripcion']) && isset($_SESSION['idUsuario'])) {
      $titulo = $_REQUEST["titulo"];
      $descripcion = $_REQUEST["descripcion"];
      $idUsuario = $_SESSION['idUsuario'];

      $idTarea = $this->tarea->insertarTarea($titulo, $descripcion, $idUsuario);

      if (isset($idTarea)) {
        header("Location: ./index.php?action=mostrarListaTareas");
      } else {
        $data["listaTareas"] = $this->tarea->obtenerTareasUsuario($idUsuario);
        View::render("tarea/formError", $data);
      }
    } else {
      View::render("tarea/form");
    }
  }


  public function borrarTarea()
  {
    if (isset($_SESSION['idUsuario']) && isset($_REQUEST["idTarea"])) {
      $idTarea = $_REQUEST["idTarea"];
      $idUsuario = $_SESSION['idUsuario'];
      $resultComprobacion = $this->tarea->comprobarUsuarioTarea($idTarea, $idUsuario);
      if (count($resultComprobacion) > 0) {
        $resultDeleteTarea = $this->tarea->deleteTarea($idTarea, $idUsuario);
        if (isset($resultDeleteTarea)) {
          header("Location: ./index.php?action=mostrarListaTareas");
        } else {
          header("Location: ./index.php?algo_a_salido_mal");
        }
      } else {
        header("Location: ./index.php?action=mostrarListaTareas");
      }
    } else {
      $this->loginUsuario();
    }
  }

  public function formularioModificarTarea()
  {
    if (isset($_SESSION['idUsuario']) && isset($_REQUEST["idTarea"])) {
      $idTarea = $_REQUEST["idTarea"];
      $idUsuario = $_SESSION['idUsuario'];
      $resultComprobacion = $this->tarea->comprobarUsuarioTarea($idTarea, $idUsuario);
      if (count($resultComprobacion) == 0) {
        header("Location: ./index.php?action=mostrarListaTareas");
      } else {
        $data["tarea"] = $this->tarea->get($idTarea)[0];
        View::render("tarea/form", $data);
      }
    } else {
      $this->loginUsuario();
    }
  }


  public function modificarTarea()
  {
    if (isset($_SESSION['idUsuario']) && isset($_REQUEST["idTarea"])) {
      $idTarea = $_REQUEST["idTarea"];
      $titulo = $_REQUEST["titulo"];
      $descripcion = $_REQUEST["descripcion"];
      $idUsuario = $_SESSION['idUsuario'];

      $resultComprobacion = $this->tarea->comprobarUsuarioTarea($idTarea, $idUsuario);

      if (count($resultComprobacion) > 0) {
        $resultModificarTarea = $this->tarea->modificarTarea($idTarea, $titulo, $descripcion);
        if (isset($resultModificarTarea)) {
          header("Location: ./index.php?action=mostrarListaTareas");
        } else {
          $data["listaTareas"] = $this->tarea->obtenerTareasUsuario($idUsuario);
          View::render("tarea/formError", $data);
        }
      } else {
        header("Location: ./index.php?action=mostrarListaTareas");
      }
    } else {
      $this->loginUsuario();
    }
  }



  public function loginUsuario()
  {
    if (isset($_REQUEST["usuario"]) && isset($_REQUEST["password"])) {
      $usuario = $_REQUEST["usuario"];
      $password = hash('sha512', $_POST['password']);

      $result = $this->usuarios->login($usuario, $password);

      if ($result) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['idUsuario'] = $this->usuarios->getIdUsuario($usuario);

        return $this->mostrarListaTareas();
      } else {

        return View::render("login/formError");
      }
    } else {
      View::render("login/form");
    }
  }


  public function registrarUsuario()
  {
    if (isset($_REQUEST["usuario"]) && isset($_REQUEST["password"]) && isset($_REQUEST["password2"])) {
      $usuario = strtolower($_POST['usuario']);
      $password = hash('sha512', $_POST['password']);
      $password2 = hash('sha512', $_POST['password2']);
      if ($password != $password2) {
        View::render("login/formError");
        return;
      } elseif ($this->usuarios->comprobarUsuario($usuario) == null) {
        $result = $this->usuarios->registro($usuario, $password);
        if ($result > 0) {
          View::render("login/form");
        } else {
          View::render("registro/formError");
          return;
        }
      } else {
        View::render("registro/formError");
        return;
      }
    } else {
      View::render("registro/form");
    }
  }

  public function cerrarSesion()
  {
    session_destroy();
    $_SESSION[] = array();
    header("Location: ./index.php");
  }
}
