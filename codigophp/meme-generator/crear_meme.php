<?php
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
    <title>Crear meme</title>
</head>
<body>
<?php
    echo '
        <form action="nuevo_meme.php?id=' . $id . '&box_count=' . $box_count . '" method="post">';
            for ($i = 1; $i <= $box_count; $i++) {
                echo '
                    <label for="texto'.$i.'">Texto ' . $i . ':</label>
                    <input type="text" name="texto'.$i.'">
                ';
            }
    echo '
        <input type="submit" value="Crear">
        </form>
        <img height="500px" src="' . $url . '">
    ';
?>
</body>
</html>
