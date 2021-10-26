<?php
//url for meme creation
$url = 'https://api.imgflip.com/caption_image';

//The data you want to send via POST
$fields = array(
        "template_id" => "112126428",
        "username" => "fjortegan",
        "password" => "pestillo",
        "boxes" => array( 
            array("text" => "Frontend",
                  "color" => "#ff8484"),
            array("text" => "Alumno DAW",
                  "color" => "#D6FFF6"),
            array("text" => "Backend",
                  "color" => "#2374ab")
        ));


//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);

//decode response
$data = json_decode($result, true);

//if success show image
if($data["success"]) {
    echo "<img src='" . $data["data"]["url"] . "'>";
}