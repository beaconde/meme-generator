<?php

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

if ($data["success"]) {
    echo "<img src='" . $data["data"]["url"] . "'>";
}