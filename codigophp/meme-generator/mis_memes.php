<?php
require_once "../model/bd.php";
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();

$my_model = Model::getInstance();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    echo '<title>Memes de ' . $_SESSION["username"] . '</title>';
    ?>
</head>
<body>
<?php
    echo '<h1>Memes de ' . $_SESSION["username"] . '</h1>';
    echo '<a href="listado_memes.php">Crear meme</a> <br>';
    echo '<a href="perfil.php">Volver al perfil</a> <br>';
    if (isset($_GET["text"])) {
        echo '<h2>' . $_GET["text"] . '</h2>';
    }

    foreach ($my_model->usuarios() as $usuario) {
        if ($usuario->getUsername() == $_SESSION["username"]) {
            $mis_memes = $usuario->getMemes();
        }
    }

    foreach ($mis_memes as $meme) {
        echo '
            <hr>
            <img src="' . $meme->getImage() . '">
            <a href="borrar_meme.php?id=' . $meme->getId() . '">Borrar meme</a>
        ';
    }

?>

</body>
</html>
