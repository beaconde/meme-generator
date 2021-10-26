<?php
    //checks if requested from form
    if(isset($_FILES["imageFile"])) {
        //move image into images folder
        move_uploaded_file($_FILES["imageFile"]["tmp_name"], "images/" . basename($_FILES["imageFile"]["name"]));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir imagen</title>
</head>
<body>
    <!-- MANDATORY: multipart/form-data -->
    <form action="" method="post" enctype="multipart/form-data">
    Imagen:
    <!-- input for uploading files -->
    <input type="file" name="imageFile" id="imageFile">
    <input type="submit" value="Subir" name="submit">
    </form>
</body>
</html>