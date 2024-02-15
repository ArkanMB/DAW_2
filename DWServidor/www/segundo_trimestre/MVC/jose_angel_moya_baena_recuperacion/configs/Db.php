<?php


class Db
{

  private $db;

  function __construct()
  {
    require_once("config.php");
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
  }

  function close()
  {
    if ($this->db)
      $this->db->close();
  }

  function dataQuery($sql)
  {
    $res = $this->db->query($sql);
    $resArray = array();
    while ($fila = $res->fetch_object()) {
      $resArray[] = $fila;
    }
    return $resArray;
  }

  function dataManipulation($sql)
  {
    $this->db->query($sql);
    return $this->db->affected_rows;
  }
}
