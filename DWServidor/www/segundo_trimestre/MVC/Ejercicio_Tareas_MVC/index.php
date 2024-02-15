<?php
require_once("./controllers/TablonController.php");
if (isset($_REQUEST["action"])) {
  $action = $_REQUEST["action"];
} else {
  $action = "mostrarListaTareas";
}

$tablon = new TablonController();
$tablon->$action();
