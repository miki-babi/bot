<?php

include 'config.php';
include 'functions.php';
// Read  JSON 
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// Check if the message is valid
if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $text = $update['message']['text'];

    // Send a response back to the user
    $reply = `https://t.me/LearnPython3/1082`;
    
    $caption = "Python Tutorial";
    sendVideo($chatId,$reply ,$caption);
}

// Respond with a 200 OK status code
http_response_code(200);