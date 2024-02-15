<?php

include_once "./configs/Db.php";

class Model
{

  protected $table;
  protected $idColumn;
  protected $db;

  public function __construct()
  {
    $this->db = new Db();
  }

  public function getAll()
  {
    return $this->db->dataQuery("SELECT * FROM " . $this->table);
  }

  public function get($id)
  {
    return $this->db->dataQuery("SELECT * FROM " . $this->table . " WHERE " . $this->idColumn . "= $id");
  }
}
