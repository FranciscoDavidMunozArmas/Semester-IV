<?php
require_once './controller/controller.php';
require_once './controller/link.php';
require_once './controller/form_carrera.php';
require_once './controller/form_departamento.php';
require_once './controller/form_career_dept.php';
require_once './model/connection.php';
require_once './model/model_career_dept.php';
require_once './model/model_departamento.php';
require_once './model/model_carrera.php';

$mvc = new Controller();
$mvc->get_template();
