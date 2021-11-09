<?php
    require_once "../model/bd.php";

    try{
        $my_model = Model::getInstance();
        if (isset($_POST["username"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $filas = $my_model->crea_usuario($username, $password);
            if ($filas == 1) {
                header("Location: ../sesion/login.php?text=Tu cuenta ha sido creada con éxito");
            } else {
                header("Location: ../model/error.php?text=No se ha podido crear el usuario " . $username);
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
    <title>Crear usuario</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Usuario: </label>
        <input type="text" name="username">
        <label for="password">Contraseña: </label>
        <input type="password" name="password">
        <input type="submit" value="Crear">
    </form>
    <?php
        echo '<span>¿Ya tienes una cuenta? <a href="../sesion/login.php">Inicia sesión</a> </span>';
    ?>
</body>
</html>
