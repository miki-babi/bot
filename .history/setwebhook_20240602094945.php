<?php 
include 'config.php';

$webHookUrl = "https://hooks.axumcode.com/index.php";
$apiUrl = "https://api.telegram.org/bot{$BOT_TOKEN}/getWebhookinfo?={$webHookUrl}";
$response= file_get_contents($apiUrl);
echo $response;