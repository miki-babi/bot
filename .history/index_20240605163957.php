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

    // process the message
    if ($message == '/start') {
        $inlineKeyboard = [
            [['text' => 'Button 1', 'callback_data' => 'button1']],
            [['text' => 'Button 2', 'callback_data' => 'button2']]
        ];
        $inlineKeyboardMarkup = $bot->createInlineKeyboard($inlineKeyboard);
        

        // a message that  also have an inline keyboard
        $bot->sendMessage($chatId, 'Welcome to your bot!', $inlineKeyboardMarkup);
        

    } else {
        // Respond with a default message
        $bot->sendMessage($chatId, 'You said: ' . $message);
    }
    if (isset($update['callback_query'])) {
        $callbackQuery = $update['callback_query'];
        $chatId = $callbackQuery['message']['chat']['id'];
        $callbackData = $callbackQuery['data'];
    
        // Check the callback data and perform actions accordingly
        if ($callbackData == 'button1') {
            // Send a message when button 1 is clicked
            $bot->sendMessage($chatId, 'Button 1 was clicked!');
        } elseif ($callbackData == 'button2') {
            // Send a message when button 2 is clicked
            $bot->sendMessage($chatId, 'Button 2 was clicked!');
        }
    }
}
