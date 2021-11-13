<?php
require_once "../model/bd.php";
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();

if (isset($_FILES["imagen"])) {

    $my_model = Model::getInstance();

    $usuario = $my_model->usuario($_SESSION["username"], false);
    $imagen = $usuario->getImage();


    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/perfil/" . basename($_FILES["imagen"]["name"]));
    if ($imagen != "../img/perfil/anon.png") {
        unlink($imagen);
    }

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Cambiar foto de perfil</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data" class="form-group p-5">
        <fieldset>
            <legend>Cambiar imagen</legend>
        </fieldset>
        <label for="imagen" class="d-block">
            Nueva imagen:
            <input type="file" name="imagen" class="form-control-file mt-2">
        </label>
        <input type="submit" value="Subir imagen" class="btn btn-primary mt-3">
    </form>

    <a href="perfil.php" class="ml-5">Volver al perfil</a>

</body>
</html>
