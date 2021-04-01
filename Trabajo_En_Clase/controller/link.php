<?php

class Link
{
    static function get_link($link)
    {
        if ($link == "home" || $link == "update" || $link == "add") {
            $module = "./views/templates/" . $link . ".php";
        } else {
            $module = "./views/templates/home.php";
        }
        return $module;
    }
}
