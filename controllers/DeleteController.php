<?php
include_once ROOT.'/models/Delete.php';
class DeleteController{
    public function actionDelete_answer_id(){
        if(!$_POST) die();
        $id = trim($_POST['id']);
        Delete::delete_id($id);
        return true;
    }
}

