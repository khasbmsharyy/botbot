<?php
// includes/helpers.php
function sendTelegram($method, $params = []) {
    $config = require __DIR__ . '/../config.php';
    $token = $config['bot_token'];
    $url = "https://api.telegram.org/bot{$token}/{$method}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $res = curl_exec($ch);
    if ($res === false) {
        error_log('Curl error: ' . curl_error($ch));
    }
    curl_close($ch);
    return json_decode($res, true);
}

function sendMessage($chat_id, $text, $extra = []) {
    $params = array_merge(['chat_id' => $chat_id, 'text' => $text, 'parse_mode' => 'HTML'], $extra);
    return sendTelegram('sendMessage', $params);
}
