<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.04.2018
 * Time: 21:35
 */
class Bot{
    static function get_command($text){
        $target = mb_strtolower ($text);
        $mask = preg_replace("/[^а-яё ]/iu", '', $target);
        $str = preg_replace("/ {2,}/"," ",$mask);
        $pieces = explode(" ", $str);
        $m = count($pieces);
        for($i = 0;$i <= $m;$i++){
            if(iconv_strlen($pieces[$i],'UTF-8')>2) {
                $check = mb_substr($pieces[$i], 0, 4);
                if (!$check) break;
                $real .= '*' . $check . '* ';
            }
        }
        return $real;

    }

    public static function get_answer($text){

        $command = self::get_command($text);

        $sql = "SELECT * FROM `franch` WHERE MATCH(`question`) AGAINST( :command IN BOOLEAN MODE) LIMIT 10";
        $result = Db::get_answer_bot($sql,$command);

        while ($row = $result -> fetch())
        {
            if($row['question'] or $row['answer'] or $row['answer_details']) $getAllfrom[]=$row;
        }
        return $getAllfrom;
    }
    public static function bot_teach(){

        $sql = "SELECT `id`,`question`,`chat_id` FROM `franch_answer`";
        $result = Db::getPdo($sql);

        while ($row = $result -> fetch())
        {
            $getAllfrom[]=$row;
        }
        return $getAllfrom;
    }

}
