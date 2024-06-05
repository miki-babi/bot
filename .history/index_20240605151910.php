<?php

// Include the TelegramBot class
include 'config.php';
include 'Methods.php';


// Instantiate the TelegramBot class with your bot token
$bot = new TelegramBot($token);

// Long-polling to get updates
$update = json_decode(file_get_contents('php://input'), true);

// Check if there is a message
if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $message = $update['message']['text'];

    // Process the message
    if ($message == '/start') {
        
        // Respond with a welcome message
        $bot->sendMessage($chatId, 'Welcome to your bot!');
    } else {
        // Respond with a default message
        $bot->sendMessage($chatId, 'You said: ' . $message);
    }
}
