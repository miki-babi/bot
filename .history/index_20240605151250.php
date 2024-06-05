<?php

include 'config.php';
// include 'functions.php';
include 'Methods.php';

// Read  JSON 
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// Check if the message is valid
if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $message = $update['message']['text'];

    // Send a response back to the user
    if ($message == '/start') {
        // Respond with a welcome message
        $bot->sendMessage($chatId, 'Welcome to your bot!');
    } else {
        // Respond with a default message
        $bot->sendMessage($chatId, 'You said: ' . $message);
    }
}

// Respond with a 200 OK status code
http_response_code(200);