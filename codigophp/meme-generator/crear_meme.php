<?php
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();

$id = $_GET["id"];
$box_count = $_GET["box_count"];
$url = $_GET["url"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Crear meme</title>
</head>
<body>
    <section class="d-flex p-5">
        <?php
        echo '
        <img height="500px" src="' . $url . '">
        <form action="nuevo_meme.php?id=' . $id . '&box_count=' . $box_count . '" method="post" class="form-group ml-5 d-flex flex-column justify-content-center">';
        for ($i = 1; $i <= $box_count; $i++) {
            echo '
                    <label for="texto'.$i.'" class="d-block">
                        Texto ' . $i . ':
                        <input type="text" name="texto'.$i.'" class="form-control" required>
                    </label>
                ';
        }
        echo '
        <input type="submit" value="Crear" class="btn btn-primary mt-3">
        </form>
    ';
        ?>
    </section>
</body>
</html>
