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

    public function sendMessage($chatId, $text, $replyMarkup = null) {
        $parameters = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML'
        ];

        if ($replyMarkup) {
            $parameters['reply_markup'] = json_encode($replyMarkup);
        }

        return $this->sendRequest('sendMessage', $parameters);
    }

    public function sendVideo($chatId, $videoUrl, $caption = "", $replyMarkup = null) {
        $parameters = [
            'chat_id' => $chatId,
            'video' => $videoUrl,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ];

        if ($replyMarkup) {
            $parameters['reply_markup'] = json_encode($replyMarkup);
        }

        return $this->sendRequest('sendVideo', $parameters);
    }

    public function sendPhoto($chatId, $photoUrl, $caption = "", $replyMarkup = null) {
        $parameters = [
            'chat_id' => $chatId,
            'photo' => $photoUrl,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ];

        if ($replyMarkup) {
            $parameters['reply_markup'] = json_encode($replyMarkup);
        }

        return $this->sendRequest('sendPhoto', $parameters);
    }

    public function sendDocument($chatId, $documentUrl, $caption = "", $replyMarkup = null) {
        $parameters = [
            'chat_id' => $chatId,
            'document' => $documentUrl,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ];

        if ($replyMarkup) {
            $parameters['reply_markup'] = json_encode($replyMarkup);
        }

        return $this->sendRequest('sendDocument', $parameters);
    }

    public function sendLocation($chatId, $latitude, $longitude) {
        $parameters = [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude
        ];

        return $this->sendRequest('sendLocation', $parameters);
    }
    public function createInlineKeyboard($inlineKeyboard) {
        return [
            'inline_keyboard' => $inlineKeyboard
        ];
    }
}
