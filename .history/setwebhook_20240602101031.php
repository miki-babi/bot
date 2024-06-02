<?php
// Your bot token
$token = '6704873209:AAEMABF5SHvx25LByHgBHbliaNyBp6m_66A';

// Your webhook URL
$webhookUrl = 'https://hooks.axumcode.com';

// Telegram API URL to set the webhook
$apiUrl = "https://api.telegram.org/bot$token/setWebhook";

// Set the webhook using PHP
$params = [
    'url' => $webhookUrl
];

jkj
$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($params),
    ],
];

$context  = stream_context_create($options);
$result = file_get_contents($apiUrl, false, $context);

if ($result === FALSE) {
    die('Error setting webhook');
}

echo $result;
