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
    <title>Listado de memes</title>
</head>
<body>
    <h1>Elige tu plantilla</h1>
    <?php
        $url = 'https://api.imgflip.com/get_memes';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);

        if ($data["success"]) {
            foreach ($data["data"]["memes"] as $meme) {
//                echo '<h2>' . $meme["name"] . '</h2>';
                echo '<a href="crear_meme.php?id=' . $meme["id"] . '&box_count=' . $meme["box_count"] . '&url=' . $meme["url"] . '" ><img width ="150px" src="' . $meme["url"] . '"></a>';
            }
        }
    ?>
</body>
</html>
