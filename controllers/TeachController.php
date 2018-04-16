<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.04.2018
 * Time: 11:38
 */
include_once ROOT.'/models/Bot.php';
class TeachController{
    public function actionTeach_bot(){
        $result = Bot::bot_teach();
        require_once (ROOT. '/views/home/teach.php');
        return true;
    }
    public function actionQuestion(){
        //$result = Bot::bot_teach();
        require_once (ROOT. '/views/home/question.php');
        return true;
    }
}