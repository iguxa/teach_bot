<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.04.2018
 * Time: 19:06
 */
include_once ROOT.'/models/Change.php';
class ChangeController{
    public function actionAnswer(){
        if(!$_POST) die();
        $result = Change::change_answer();
        echo $result;
        return true;
    }
    public function actionTake_answer(){
        echo 'actionTake_answer';
        if(!$_POST) die();
        foreach($_POST['data'] as $key => $value)
        {
            $id_old.= trim($value['0']).',';
            $chat_id_old[] = trim($value['1']);
        }
        $id = rtrim($id_old,',');

        $chat_id = array_unique($chat_id_old);
        sort($chat_id);
        $question = trim($_POST['base']['0']);
        $answer = trim($_POST['base']['1']);
        $answer_details = trim($_POST['base']['2']);
        var_dump($_POST['data']);
        echo '<pre>';
        var_dump($id);var_dump($chat_id);
        echo 'endactionTake_answer';
        Change::take_answer($id,$chat_id,$question,$answer,$answer_details);


        return true;
    }
    public function actionAdd_answer(){
        if(!$_POST) die();
        $question = trim($_POST['question']);
        $answer = trim($_POST['answer']);
        $answer_details = trim($_POST['answer_details']);
        Change::take_new_answer($question,$answer,$answer_details);
        //var_dump($_POST);
        return true;
    }

}