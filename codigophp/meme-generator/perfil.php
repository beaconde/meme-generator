<?php
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        echo '<title>Perfil de ' . $_SESSION["username"] . '</title>';
    ?>
</head>
<body>
<?php
    echo '<h1>Bienvenido ' . $_SESSION["username"] . '</h1>';
    echo '<a href="listado_memes.php">Crear meme</a> <br>';
    echo '<a href="../usuarios/borrar_usuario.php" >Borrar cuenta</a> <br>';
    echo '<a href="../usuarios/actualizar_usuario.php" >Editar cuenta</a>';
?>
    <form action="../sesion/action.php" method="post">
        <input type="submit" name="action" value="Cerrar sesión">
    </form>
</body>
</html>
