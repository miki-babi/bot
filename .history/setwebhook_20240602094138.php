<?php 
include 'config.php';

$webHookUrl = "https://hooks.axumcode.com/index.php";
$apiUrl = "https://api.telegram.org/bot{$BOT_TOKEN}/setWebhook?={$webHookUrl}";
$response= file_get_contents($apiUrl);
if ($response === false) {
    echo "Error";
}else {
    $response = json_decode($response, true);
    var_dump($response);
}
