<?php
$token = getenv('BOT_TOKEN');
$website = 'https://api.telegram.org/bot' . $token;
$input = file_get_contents('php://stdin');
$update = json_decode($input, TRUE);
if (!isset($update['message'])) {
    exit(0);
}
$chatId = $update['message']['chat']['id'];
$message = isset($update['message']['text']) ? $update['message']['text'] : '';
switch ($message) {
    case '/start':
        $response = 'iniciando!!!';
        sendMessage($chatId, $response);
        break;
    case 'quien es la poti':
        $response = 'La guaga mas linda!!!';
        sendMessage($chatId, $response);
        break;
    default:
        $response = 'no te entiendo!!!';
        sendMessage($chatId, $response);
        break;
}
function sendMessage($chatId, $text) {
    global $website;
    $url = $website . '/sendMessage';
    $data = ['chat_id' => $chatId, 'text' => $text];
    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($data),
        ],
    ];
    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}
