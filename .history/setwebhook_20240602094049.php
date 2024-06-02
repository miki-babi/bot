<?php 
include 'config.php';

$webHookUrl = "https://hooks.axumcode.com/bot.php";
$apiUrl = "https://api.telegram.org/bot{$BOT_TOKEN}/setWebhook?={$webHookUrl}";
$response= file_get_contents($apiUrl);
if ($response === false) {
    echo "Error";
}else {
    $response = json_decode($response, true);
    dump($response);
}