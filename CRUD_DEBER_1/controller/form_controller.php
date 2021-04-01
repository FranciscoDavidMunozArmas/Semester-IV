<?php
class Form_Controller
{
    public static function create()
    {
        if (
            isset($_POST["name"]) &&
            isset($_POST["surname"]) &&
            isset($_POST["user_id"])
        ) {

            $table = "user";
            $data = array(
                "user" => $_POST["name"],
                "surname" => $_POST["surname"],
                "user_id" => $_POST["user_id"]
            );
            $response = Model::create($table, $data);
            echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                } </script>';
            return $response;
        }
    }

    public static function select($column, $value)
    {
        $table = "user";
        $response = Model::read($table, null, null);
        return $response;
    }

    public static function update()
    {
        if (
            isset($_POST["name_update"]) &&
            isset($_POST["surname_update"]) &&
            isset($_POST["user_id_update"])
        ) {

            $table = "user";
            $data = array(
                "id" => $_POST["update"],
                "user" => $_POST["name_update"],
                "surname" => $_POST["surname_update"],
                "user_id" => $_POST["user_id_update"]
            );
            $response = Model::update($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?action=inicio";
                </script>';
            }
        }
    }

    public static function delete()
    {
        if (isset($_POST["delete"])) {
            $table = "user";
            $data = $_POST["delete"];
            $response = Model::delete($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?action=inicio";
                </script>';
            }
        }
    }
}
