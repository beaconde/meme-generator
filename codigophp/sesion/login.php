<?php
    session_start();
    if (isset($_SESSION["username"])) {
        header("Location: ../meme-generator/perfil.php");
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
</head>
<body>
    <form action="action.php" method="post">
        <label for="username">Usuario: </label>
        <input type="text" name="username">
        <label for="password">Contraseña: </label>
        <input type="password" name="password">

        <input type="submit" value="Iniciar sesión" name="action">
    </form>
    <?php
        echo '<span>¿No tienes una cuenta? <a href="../usuarios/crear_usuario.php">Regístrate</a> </span>';
        if (isset($_GET["text"])) {
            echo '<span>' . $_GET["text"] . '</span>';
        }
    ?>
</body>
</html>
