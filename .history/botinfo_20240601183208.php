<?php
include 'config.php';
$apiUrl ="https://api.telegram.org/bot{$BOT_TOKEN}/getUpdates";
$response= file_get_contents($apiUrl);
if ($response === false) {
    echo "Error";
}else {
    $response = json_decode($response, true);
    echo $response;
}
