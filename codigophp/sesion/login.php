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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Iniciar sesión</title>
</head>
<body>
    <form action="action.php" method="post" class="form-group p-5">
        <fieldset>
            <legend>Iniciar sesión</legend>
            <label for="username" class="d-block">
                Usuario:
                <input type="text" name="username" class="form-control w-25">
            </label>
            <label for="password" class="d-block">
                Contraseña:
                <input type="password" name="password" class="form-control w-25">
            </label>
            <input type="submit" value="Iniciar sesión" name="action" class="btn btn-primary mt-3">
        </fieldset>
    </form>
    <?php
        echo '<span class="p-5">¿No tienes una cuenta? <a href="../usuarios/crear_usuario.php">Regístrate</a> </span>';
        if (isset($_GET["text"])) {
            echo '
                <div class="pl-5 pt-3">
                    <span class="alert alert-primary d-block w-25">' . $_GET["text"] . '</span>
                </div>
            ';
        }
    ?>
</body>
</html>
