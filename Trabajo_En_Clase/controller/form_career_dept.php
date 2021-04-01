<?php
class Form_Career_Dept
{
    public static function create()
    {
        if (
            isset($_POST["id_dept"]) &&
            isset($_POST["id_career"])
        ) {

            $table = "DEPT_CARRERA";
            $data = array(
                "id_dept" => $_POST["id_dept"],
                "id_career" => $_POST["id_career"]
            );
            $response = Model_Career_Dept::create($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                 if(window.history.replaceState){
                     window.history.replaceState(null, null, window.location.href);
                     window.location.reload();
                 } </script>';
            }
            return $response;
        }
    }

    public static function select($value)
    {
        $table = "DEPT_CARRERA";
        $response = Model_Career_Dept::read($table, $value);
        return $response;
    }

    public static function delete()
    {
        if (
            isset($_POST["id_dept"]) &&
            isset($_POST["id_career"])
        ) {
            $table = "DEPT_CARRERA";
            $table = "DEPT_CARRERA";
            $data = array(
                "id_dept" => $_POST["id_dept"],
                "id_career" => $_POST["id_career"]
            );
            $response = Model_Career_Dept::delete($table, $data);
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
