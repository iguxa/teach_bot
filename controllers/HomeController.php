<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.04.2018
 * Time: 16:58
 */
include_once ROOT.'/models/Answer.php';
class HomeController{
    public function actionIndex()
    {
        $result = Answer::get_all_answer();
        require_once (ROOT. '/views/home/index.php');
        return true;
    }
    public function actionTest()
    {
        require_once (ROOT. '/views/home/test.php');
        return true;
    }
}