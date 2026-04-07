<?php
$token='8657098940:AAHkX5rVxWp_IMWt84qa-kUYsBZCI-qPBjI';
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
?>