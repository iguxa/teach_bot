<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.04.2018
 * Time: 18:08
 */
class Answer{
    public static function get_all_answer(){

        $sql = "SELECT * FROM `franch` ORDER BY `id` DESC";
        $result = Db::getPdo($sql);

        while ($row = $result -> fetch())
        {
            if($row['question'] or $row['answer'] or $row['answer_details']) $getAllfrom[]=$row;
        }
        return $getAllfrom;
    }
}