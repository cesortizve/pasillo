<?php
$token='8642484008:AAHzS9-zd7yLf-la8jx8BUOQYteLA1TVehU';
$website = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input,TRUE);

$chatId = $update['message']['chat']['id'];
$message = $update['message']['text'];

switch($message){
    case '/start':
        $response='iniciando!!!';
        sendMessage($chatId,$response);
        break;
    case 'quien es la poti':
        $response='La guaga mas linda!!!';
        sendMessage($chatId,$response);
        break;
    default:
        $response='no te entiendo!!!';
        sendMessage($chatId,$response);
        break;
}

function sendMessage($chatId, $message){
    global $website;
    $url = $website.'/sendMessage?chat_id='.$chatId.'&text='.urlencode($message);
    file_get_contents($url);
}
?>
    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}
