<?php
class TelegramBot {
    private $token;

    public function __construct($token) {
        $this->token = $token;
    }

    private function sendRequest($method, $parameters) {
        $url = "https://api.telegram.org/bot{$this->token}/{$method}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function sendMessage($chatId, $text) {
        $parameters = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML'
        ];
        return $this->sendRequest('sendMessage', $parameters);
    }

    public function sendVideo($chatId, $videoUrl, $caption = "") {
        $parameters = [
            'chat_id' => $chatId,
            'video' => $videoUrl,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ];
        return $this->sendRequest('sendVideo', $parameters);
    }

    public function sendPhoto($chatId, $photoUrl, $caption = "") {
        $parameters = [
            'chat_id' => $chatId,
            'photo' => $photoUrl,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ];
        return $this->sendRequest('sendPhoto', $parameters);
    }

    public function sendDocument($chatId, $documentUrl, $caption = "") {
        $parameters = [
            'chat_id' => $chatId,
            'document' => $documentUrl,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ];
        return $this->sendRequest('sendDocument', $parameters);
    }
}
