<?php
require_once "../model/bd.php";
require_once "../sesion/Sesion.php";
$sesion = new Sesion();
$sesion->check_logged_in();

if (isset($_POST["meme"])) {

    try {
        $my_model = Model::getInstance();

        $usuario = $my_model->usuario($_SESSION["username"], false);
        $id_usuario = $usuario->getId();


        $date = date("Y-m-d");

        $url = $_POST["meme"];
        $name = $date . substr($url, strpos($url,".com/")+5, -4);

        $img = "../img/" . $name . ".png";
        file_put_contents($img, file_get_contents($url));

        $filas = $my_model->crea_meme($name, $img, $id_usuario);
        if ($filas == 0) {
            header("Location: ../model/error.php?text=No se ha podido crear el meme :(");
        } else {
            header("Location: mis_memes.php?text=Se ha creado el meme con éxito!!!");
        }


    } catch (PDOException $e) {
        header("Location: ../model/error.php?text=Se ha producido una excepción PDO: " . $e->getMessage());
    }
} else {
    $id = $_GET["id"];
    $box_count = $_GET["box_count"];

    $url = "https://api.imgflip.com/caption_image";

    $array = array();
    for ($i=1;$i<=$box_count;$i++) {
        array_push($array, array("text" => $_POST["texto$i"]));
    }

    $fields = array(
        "template_id" => $id,
        "username" => "fjortegan",
        "password" => "pestillo",
        "boxes" => $array
    );

    $fields_string = http_build_query($fields);
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    $data = json_decode(curl_exec($ch), true);
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
    <title>Nuevo meme</title>
</head>
<body>
    <section class="d-flex p-5">
        <?php
        if ($data["success"]) {
            echo "<img src='" . $data["data"]["url"] . "' >";
        }
        ?>
        <form action="" method="post" class="d-flex flex-column justify-content-center ml-5">
            <?php
            echo '<input type="hidden" name="meme" value="' . $data["data"]["url"] . '">';
            ?>
            <input type="submit" value="Guardar" class="btn btn-primary mt-3">
        </form>
    </section>
</body>
</html>
