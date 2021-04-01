<?php

class Connection
{
    public static function Init_connection()
    {
        $link = new PDO("mysql: host=localhost;dbname=user_mysql;", "root", "");
        $link->exec("set names utf8");
        return $link;
    }
}
