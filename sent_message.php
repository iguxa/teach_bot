<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.04.2018
 * Time: 18:39
 */



/**
 * revcom_bot
 *
 * @author - Александр Штокман
 */
header('Content-Type: text/html; charset=utf-8');
// подрубаем API
require_once("vendor/autoload.php");

define('ROOT',dirname(__FILE__));
require_once(ROOT.'/components/telegram_bot.php');
require_once(ROOT.'/components/db.php');



// дебаг
if(true){
    error_reporting(E_ALL & ~(E_NOTICE | E_USER_NOTICE | E_DEPRECATED));
    ini_set('display_errors', 1);
}
$bookshelf[] = $_REQUEST;
$filename = 'request.json';
$data = json_encode($bookshelf,true);  // JSON формат сохраняемого значения.
file_put_contents($filename, $data);


$data = file_get_contents($filename);
$bookshelf = json_decode($data,true);

//var_dump($bookshelf);
$done = json_decode($bookshelf['0']['0']);

$reciver = count($done);

// создаем переменную бота
$token = param::token();
$chat_id_chanel = param::chat_id_chanel();
$bot = new \TelegramBot\Api\Client($token,null);

$result = "На ваш вопрос: <b>".$bookshelf['0']['1']."</b> получен ответ\r\n <b>Общий совет:</b>\r\n ".$bookshelf['0']['2']."\r\n<b>Ваши действия:</b> \r\n ".$bookshelf['0']['3'];


for($i = 0;$i<$reciver;$i++){
    $bot->sendMessage($done[$i], $result);
}



// запускаем обработку
$bot->run();

echo "бот";