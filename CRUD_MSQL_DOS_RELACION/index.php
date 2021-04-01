<?php

require_once './controller/controller.php';
require_once './controller/link.php';
require_once './controller/form_controller.php';
require_once './model/model.php';
require_once './model/connection.php';

$mvc = new Controller();
$mvc->get_template();
