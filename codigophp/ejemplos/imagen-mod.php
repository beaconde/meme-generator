<?php
    //checks query for custom text
    $text = isset($_GET["text"])? $_GET["text"] : 'I wanna be a developer';

    //checks query for image file
    $image = isset($_GET["image"])? "images/" . $_GET["image"] : 'images/dog.jpg';

    //load image
    $im = imagecreatefromjpeg($image);

    //response will be a jpeg image
    header('Content-Type: image/jpeg');

    //choose color
    $blue = imagecolorallocate($im, 0x14, 0x36, 0x42);

    //ruta archivo de fuente ttf
    $font_file = './fonts/Lora.ttf';
    
    //draws text with size 40
    imagefttext($im, 36, 0, 40, 100, $blue, $font_file, $text);

    //write image data in response
    imagejpeg($im);

    //destroy image object
    imagedestroy($im);
?>
