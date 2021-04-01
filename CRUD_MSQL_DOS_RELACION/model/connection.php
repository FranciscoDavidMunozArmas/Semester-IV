<?php

class Connection
{
    static function init_connection()
    {
        $user = "root";
        $password = "";
        $server = "localhost";
        $db = "empleado";
        $link  = new PDO("mysql: host=" . $server . ";dbname=" . $db . ";", $user, $password);
        $link->exec("set names utf8");
        return $link;
    }
}
