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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Crear usuario</title>
</head>
<body>
    <form action="" method="post" class="form-group p-5">
        <fieldset>
            <legend>Crear cuenta</legend>
            <label for="username" class="d-block">
                Usuario:
                <input type="text" name="username" class="form-control w-25">
            </label>
            <label for="password" class="d-block">
                Contraseña:
                <input type="password" name="password" class="form-control w-25">
            </label>
            <input type="submit" value="Crear" class="btn btn-primary mt-3">
        </fieldset>
    </form>
    <?php
        echo '<span class="p-5">¿Ya tienes una cuenta? <a href="../sesion/login.php">Inicia sesión</a> </span>';
    ?>
</body>
</html>
