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
        $inlineKeyboard = [
            [['text' => 'Button 1', 'callback_data' => 'button1']],
            [['text' => 'Button 2', 'callback_data' => 'button2']]
        ];
        $inlineKeyboardMarkup = $bot->createInlineKeyboard($inlineKeyboard);

        // Respond with a message containing the inline keyboard
        $bot->sendMessage($chatId, 'Welcome to your bot!', $inlineKeyboardMarkup);
        // Respond with a welcome message

    } else {
        // Respond with a default message
        $bot->sendMessage($chatId, 'You said: ' . $message);
    }
}
