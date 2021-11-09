<?php

require_once '../model/bd.php';
require_once '../sesion/Sesion.php';

try {
    $my_model = Model::getInstance();
    $sesion = new Sesion();

    $username = $_SESSION["username"];
    $filas = $my_model->borra_usuario($username);

    if ($filas == 0) {
        header("Location: ../model/error.php?text=No se ha podido borrar el usuario " . $username );
    } else {
        $sesion->log_out();
        header("Location: ../sesion/login.php?text=Se ha borrado con éxito la cuenta de " . $username );
    }
} catch (PDOException $e ) {
    header("Location: ../model/error.php?text=Se ha producido una excepción PDO: " . $e->getMessage());
}

