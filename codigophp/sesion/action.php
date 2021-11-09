<?php

require_once "../model/bd.php";
require_once "Sesion.php";

$action = $_POST["action"];
$sesion = new Sesion();

if ($action == "Iniciar sesión") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sesion->log_in($username, $password);
} else if ($action == "Cerrar sesión") {
    $sesion->log_out();
}
