<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.04.2018
 * Time: 21:34
 */
include_once ROOT.'/models/Bot.php';
class TestController{
    public function actionBot(){
        if(!$_POST) die();
        $text = trim($_POST['search']);
        $result = Bot::get_answer($text);
        if(!$result) echo 'Ничего не найдено';
        else require_once (ROOT. '/views/includes/answer.php');
        return true;
    }
}