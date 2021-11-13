<?php
require_once "../model/bd.php";
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();

$id_meme = $_GET["id"];

try {
    $my_model = Model::getInstance();

    $meme = $my_model->meme($id_meme);
    unlink($meme->getImage());

    $filas = $my_model->borra_meme($id_meme);

    if ($filas == 0) {
        header("Location: ../model/error.php?text=No se ha podido borrar el meme con id " . $id_meme);
    } else {
        header("Location: mis_memes.php?text=Se ha eliminado el meme con éxito");
    }

} catch (PDOException $e) {
    header("Location: ../model/error.php?text=Se ha producido una excepción PDO: " . $e->getMessage());
}
