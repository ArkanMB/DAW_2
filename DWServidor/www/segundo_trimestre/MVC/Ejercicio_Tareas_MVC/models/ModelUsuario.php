<?php

// MODELO DE USUARIOS

include_once "Model.php";

class ModelUsuario extends Model
{

  public function __construct()
  {
    $this->table = "usuarios";
    $this->idColumn = "id";
    parent::__construct();
  }

  public function login($usuario, $password)
  {
    return $this->db->dataQuery("SELECT * FROM usuarios 
                                  WHERE usuario = '$usuario' 
                                  AND `password` = '$password' LIMIT 1");
  }

  public function getIdUsuario($usuario)
  {
    return $this->db->dataQuery("SELECT id FROM usuarios WHERE usuario = '$usuario' LIMIT 1")[0]->id;
  }

  public function comprobarUsuario($usuario)
  {
    return $this->db->dataQuery("SELECT * FROM usuarios WHERE usuario = '$usuario' LIMIT 1");
  }

  public function registro($usuario, $password)
  {
    return $this->db->dataManipulation("INSERT INTO usuarios (usuario,`password`) 
                                        VALUES ('$usuario','$password')");
  }
}
