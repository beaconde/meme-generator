<?php
require_once "../model/bd.php";
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();

$my_model = Model::getInstance();
foreach ($my_model->usuarios() as $usuario) {
    if ($usuario->getUsername() == $_SESSION["username"]) {
        $username = $usuario->getUsername();
        $mis_memes = $usuario->getMemes();
        break;
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
    <?php
    echo '<title>Memes de ' . $username . '</title>';
    ?>
</head>
<body>
    <header class="pl-5 pt-5 pb-3">
        <?php
        echo '<h1>Memes de ' . $username . '</h1>';
        echo '<a href="listado_memes.php" class="btn btn-primary mt-4">Crear meme</a>';
        echo '<a href="perfil.php" class="d-block mt-3">Volver al perfil</a>';
        if (isset($_GET["text"])) {
            echo '<span class="alert alert-primary d-block w-25 mt-4">' . $_GET["text"] . '</span>';
        }

        ?>
    </header>
    <main>
        <?php
        foreach ($mis_memes as $meme) {
            echo '
            <hr class="ml-4 mr-4">
            <img src="' . $meme->getImage() . '" class="p-5">
            <a href="borrar_meme.php?id=' . $meme->getId() . '" class="btn btn-primary">Borrar meme</a>
        ';
        }
        ?>
    </main>
</body>
</html>
