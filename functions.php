<?php 
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