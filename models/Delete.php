<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.04.2018
 * Time: 14:34
 */
class Delete
{
    public static function delete_id($id)
    {
        $sql = "DELETE FROM `franch` WHERE `id` = :id";
        Db::delete_id($sql,$id);
        echo 'success delete '.$id;
        return true;
    }
}