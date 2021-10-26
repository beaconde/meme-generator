<?php
//url for meme list
$url = 'https://api.imgflip.com/get_memes';

//open connection
$ch = curl_init();

//set the url
curl_setopt($ch,CURLOPT_URL, $url);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//receive url content 
$result = curl_exec($ch);

//decode content (assoc array)
$data = json_decode($result, true);

//if success shows images
if($data["success"]) {
    //iterates over memes array
    foreach($data["data"]["memes"] as $meme) {
        //show meme image
        echo "<img width='50px' src='" . $meme["url"] . "'>";
    }
}