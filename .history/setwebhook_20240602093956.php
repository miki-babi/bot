<?php 
include 'config.php';

$webHookUrl = "https://hooks.axumcode.com/bot.php";
$apiUrl = "https://api.telegram.org/bot{$BOT_TOKEN}/setWebhook?={$webHookUrl}";
$data = array(
    'url' => $webHookUrl,
    'max_connections' => 40
);
$data = http_build_query($data);
$curl = curl_init();
