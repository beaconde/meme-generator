<?php
require_once "../model/bd.php";
require_once  "../sesion/Sesion.php";
$sesion = new Sesion();

try {
    if (isset($_POST["username"])) {
        $my_model = Model::getInstance();
        $current_username = $_SESSION["username"];
        $new_username = $_POST["username"];
        $new_password = $_POST["password"];

        $filas = $my_model->actualiza_usuario($new_username, $new_password, $current_username);
        if ($filas == 0) {
            header ("Location: ../model/error.php?text=No se ha podido actualizar el usuario " . $current_username);
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
    <title>Editar cuenta</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Nuevo usuario: </label>
        <?php
          echo '<input type="text" name="username" value="' . $_SESSION["username"] . '">';
        ?>
        <label for="password">Nueva contraseña: </label>
        <input type="password" name="password">
        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>
