<?php
include_once "Model.php";

class ModelTarea extends Model
{

  public function __construct()
  {
    $this->table = "tarea";
    $this->idColumn = "id";
    parent::__construct();
  }

  public function comprobarUsuarioTarea($idTarea, $idUsuario)
  {
    return $this->db->dataQuery("SELECT * FROM `usuarios_tarea` 
                                 WHERE `tarea` = '$idTarea' 
                                 AND `usuario` = '$idUsuario'");
  }

  public function getLastId()
  {
    $result = $this->db->dataQuery("SELECT MAX(id) as idTarea FROM tarea");
    return $result[0]->idTarea;
  }

  public function insertarTarea($titulo, $descripcion, $idUsuario)
  {

    $this->db->dataManipulation("INSERT INTO tarea(titulo, descripcion) 
                                  values ('$titulo', '$descripcion')");
    $idTarea = $this->getLastId();
    $this->db->dataManipulation("INSERT INTO usuarios_tarea(tarea, usuario) 
                                  values ('$idTarea', '$idUsuario')");
    return $idTarea;
  }


  public function modificarTarea($idTarea, $titulo, $descripcion)
  {

    return $this->db->dataManipulation("UPDATE tarea SET 
                                        titulo = '$titulo', 
                                        descripcion = '$descripcion' 
                                        WHERE id = '$idTarea'");
  }

  public function deleteTarea($idTarea, $idUsuario)
  {
    $this->db->dataManipulation("DELETE FROM `usuarios_tarea` 
                                  WHERE `tarea` = '$idTarea'
                                  AND `usuario` = '$idUsuario'");

    return $this->db->dataManipulation("DELETE FROM `tarea` 
                                        WHERE id = '$idTarea'");
  }

  public function obtenerTareasUsuario($idUsuario)
  {
    return $this->db->dataQuery("SELECT tarea.id, tarea.titulo, tarea.descripcion
                                  FROM tarea
                                  JOIN usuarios_tarea 
                                  ON tarea.id = usuarios_tarea.tarea
                                  WHERE usuarios_tarea.usuario = '$idUsuario'");
  }
}
