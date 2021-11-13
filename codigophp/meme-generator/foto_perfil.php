<?php
require_once "../model/bd.php";
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();

if (isset($_FILES["imagen"])) {

    $my_model = Model::getInstance();
    foreach($my_model->usuarios() as $usuario) {
        if ($usuario->getUsername() == $_SESSION["username"]) {
            break;
        }
    }

    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/perfil/" . basename($_FILES["imagen"]["name"]));
    unlink($usuario->getImage());

    $filas = $my_model->subir_foto("../img/perfil/" . $_FILES["imagen"]["name"], $usuario->getUsername());
    if ($filas == 0) {
        header("Location: ../model/error.php?text=No se ha podido cambiar la imagen");
    } else {
        header("Location: perfil.php?text=Se ha cambiado la foto de perfil");
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambiar foto de perfil</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" >
        <input type="submit" value="Subir imagen">
    </form>
</body>
</html>
