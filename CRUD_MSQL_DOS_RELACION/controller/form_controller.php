<?php

class Form_Controller
{
    static function create()
    {
        if (
            isset($_POST["input_name"]) &&
            isset($_POST["input_department"])
        ) {
            $table = "empleado";
            $data = array(
                "name" => $_POST["input_name"],
                "dep_id" => $_POST["input_department"]
            );
            $response = Model::create_employee($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?action=home";
                </script>';
            } else {
                echo '<script type="text/javascript">
                alert("Error");
                </script>';
            }
        }
    }

    static function select($table, $item, $value)
    {
        $response = Model::read($table, $item, $value);
        return $response;
    }
    static function select_both($table_1, $table_2)
    {
        $response = Model::read_employee_dep($table_1, $table_2);
        return $response;
    }
    static function update()
    {
        if (
            isset($_POST["id_employee"]) &&
            isset($_POST["update_name"]) &&
            isset($_POST["update_department"])
        ) {
            $table = "empleado";
            $data = array(
                "id" => $_POST["id_employee"],
                "name" => $_POST["update_name"],
                "dep_id" => $_POST["update_department"]
            );
            $response = Model::update_employee($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?action=home";
                </script>';
            }
        }
    }
    static function delete()
    {
        if (
            isset($_POST["id_employee"])
        ) {
            $table = "empleado";
            $data = array(
                "id" => $_POST["id_employee"]
            );
            $response = Model::delete_employee($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?action=home";
                </script>';
            }
        }
    }
}
