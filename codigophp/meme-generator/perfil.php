<?php
require_once "../model/bd.php";
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();

$my_model = Model::getInstance();

$usuario = $my_model->usuario($_SESSION["username"], false);
$username = $usuario->getUsername();
$image = $usuario->getImage();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php
        echo '<title>Perfil de ' . $username . '</title>';
    ?>
</head>
<body>
    <header class="pt-4 pl-4">
        <section class="d-flex justify-content-between">
            <section class="d-flex flex-row">
                <?php
                echo '<img width="200px" src="' . $image . '">';
                echo '<h1 class="ml-5 mt-5">' . $username . '</h1>';
                ?>
            </section>
            <form action="../sesion/action.php" method="post" class="mr-5">
                <input type="submit" name="action" value="Cerrar sesión" class="btn btn-primary mt-3">
            </form>
        </section>
    </header>

    <section class="d-block w-50 p-5">
        <?php
        echo '<a href="listado_memes.php" class="btn btn-primary mt-2 d-block w-25">Crear meme</a>';
        echo '<a href="mis_memes.php" class="btn btn-primary mt-2 d-block w-25">Mis memes</a>';
        echo '<a href="foto_perfil.php" class="btn btn-primary mt-2 d-block w-25">Cambiar foto de perfil</a>';
        echo '<a href="../usuarios/actualizar_usuario.php" class="btn btn-primary mt-2 d-block w-25">Editar cuenta</a>';
        echo '<a href="../usuarios/borrar_usuario.php" class="btn btn-primary mt-2 d-block w-25">Borrar cuenta</a>';
        ?>
    </section>

</body>
</html>
