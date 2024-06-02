<?php

$token = '6704873209:AAEMABF5SHvx25LByHgBHbliaNyBp6m_66A';

// Read  JSON 
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// Check if the message is valid
if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $text = $update['message']['text'];

    // Send a response back to the user
    $reply = "You said: " . $text;
    sendMessage($chatId, $reply);
}

// Respond with a 200 OK status code
http_response_code(200);

