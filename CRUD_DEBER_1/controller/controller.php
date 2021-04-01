<?php

class Controller
{
    public function get_template()
    {
        include "./views/template.php";
    }

    public function get_page()
    {
        if (isset($_GET["action"])) {
            $link = $_GET["action"];
        } else {
            $link = "home";
        }
        $response = Link::get_link($link);
        include $response;
    }
}
