<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.04.2018
 * Time: 19:15
 */
class Change{
    public static function change_answer(){
        $id = $_POST['id'];
        $categorie = $_POST['categorie'];
        $value = $_POST['value'];
        $sql = "UPDATE `franch` SET `$categorie` = :value WHERE `id` = :id";
        $result = Db::changeAnswer($sql,$id,$categorie,$value);
        return $result;
    }
    public static function sent_message($sent_message){
        $paramsPath = ROOT . '/config/telegram.php';
        $params = include($paramsPath);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $params['url']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false); // required as of PHP 5.6.0
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sent_message);

        curl_exec($ch);
        curl_close($ch);
        var_dump($params['url']);

    }
    public static function take_answer($id,$chat_id,$question,$answer,$answer_details){
        $sql = "INSERT INTO `franch` SET `question` = :question, `answer` = :answer, `answer_details` = :answer_details";
        Db::insertAnswer($sql,$question,$answer,$answer_details);
        $sql_delete = "DELETE FROM `franch_answer` WHERE `id` IN ($id)";
        $how = Db::getPdo($sql_delete);

        $sent_message = array(json_encode($chat_id),$question,$answer,$answer_details);
        self::sent_message($sent_message);

        return $how;
    }
    public static function take_new_answer($question,$answer,$answer_details){
        $sql = "INSERT INTO `franch` SET `question` = :question, `answer` = :answer, `answer_details` = :answer_details";
        Db::insertAnswer($sql,$question,$answer,$answer_details);
        echo 'add '.$question;
        return true;
    }


}
