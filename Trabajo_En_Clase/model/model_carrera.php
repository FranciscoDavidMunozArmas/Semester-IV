<?php
class Model_Career
{
    static function read($table, $data)
    {
        $db = Connection::Init_connection();
        if ($data == null) {
            $stmt = $db->prepare(
                "SELECT * FROM $table"
            );
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = $db->prepare(
                "SELECT * FROM $table WHERE CODIGO_CARRERA=:id_career"
            );
        }
        $stmt->bindParam(":id_career", $data, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
