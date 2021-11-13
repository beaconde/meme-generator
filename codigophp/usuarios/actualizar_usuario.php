<?php
require_once "../model/bd.php";
require_once  "../sesion/Sesion.php";
$sesion = new Sesion();

try {
    $my_model = Model::getInstance();

    foreach ($my_model->usuarios() as $usuario) {
        if ($usuario->getUsername() == $_SESSION["username"]) {
            $username = $usuario->getUsername();
            break;
        }
    }

    if (isset($_POST["username"])) {
        $new_username = $_POST["username"];
        $new_password = $_POST["password"];

        $filas = $my_model->actualiza_usuario($new_username, $new_password, $username);
        if ($filas == 0) {
            header ("Location: ../model/error.php?text=No se ha podido actualizar el usuario " . $username);
        } else {
            $_SESSION["username"] = $new_username;
            header("Location: ../meme-generator/perfil.php");
        }
    }
} catch (PDOException $e) {
    header("Location: ../model/error.php?text=Se ha producido una excepción PDO: " . $e->getMessage());
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Editar cuenta</title>
</head>
<body>
    <form action="" method="post" class="form-group p-5">
        <label for="username">Nuevo usuario: </label>
        <?php
          echo '<input type="text" name="username" value="' . $username . '" class="form-control w-25">';
        ?>
        <label for="password">Nueva contraseña: </label>
        <input type="password" name="password" class="form-control w-25" required>
        <input type="submit" value="Guardar cambios" class="btn btn-primary mt-3">
    </form>

    <a href="../meme-generator/perfil.php" class="ml-5">Volver al perfil</a>

</body>
</html>
