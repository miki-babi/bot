<?php 
include 'config.php';
$webHookUrl = "https://api.telegram.org/bot{$BOT_TOKEN}/setWebhook";
$data = array(
    'url' => $webHookUrl,
    'max_connections' => 40
);
$data = http_build_query($data);
$curl = curl_init();
