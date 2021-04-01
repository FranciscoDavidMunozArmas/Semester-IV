<?php
class Form_Dept
{

    public static function create()
    {
        if (
            isset($_POST["nombre_dept"])
        ) {

            $table = "DEPARTAMENTO";
            $data = array(
                "nombre_dept" => $_POST["nombre_dept"]
            );
            $response = Model_Dept::create($table, $data);
            if ($response != null) {
                echo '<script type="text/javascript">
                 if(window.history.replaceState){
                     window.history.replaceState(null, null, window.location.href);
                     window.location = "index.php?action=add&id=' . $response . '";
                 } </script>';
            }
            return $response;
        }
    }

    public static function select($value)
    {
        $table = "DEPARTAMENTO";
        $response = Model_Dept::read($table, $value);
        return $response;
    }

    public static function update()
    {
        if (
            isset($_POST["id_dept"]) &&
            isset($_POST["nombre_dept"])
        ) {
            $table = "DEPARTAMENTO";
            $data = array(
                "id_dept" => $_POST["id_dept"],
                "nombre_dept" => $_POST["nombre_dept"]
            );
            $response = Model_Dept::update($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    window.location.reload();
                }
                </script>';
            }
        }
    }

    public static function delete()
    {
        if (isset($_POST["id_dept"])) {
            $table = "DEPARTAMENTO";
            $data = $_POST["id_dept"];
            $response = Model_Dept::delete($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    window.location.reload();
                }
                </script>';
            }
        }
    }
}
