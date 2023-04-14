<?php
$type = isset($_GET['type']) ? $_GET['type'] : 'formularios';

switch ($type) {
  case "formularios":
    require "includes/ajax-formularios.php";
    break;

  default:
    echo "<h3> - No tiene acceso para acceder a esta sección - </h3>";
}
