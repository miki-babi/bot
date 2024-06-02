<?php

$token = '6704873209:AAEMABF5SHvx25LByHgBHbliaNyBp6m_66A';

// Function to send a message 
function sendMessage($chatId, $message) {
    global $token;
    $url = "https://api.telegram.org/bot$token/sendMessage";

    $postData = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_exec($ch);
    curl_close($ch);
}

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

