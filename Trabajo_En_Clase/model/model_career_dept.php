<?php
class Model_Career_Dept
{
    static function create($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "INSERT INTO $table VALUES (null, :id_career, :id_dept);"
        );
        $stmt->bindParam(':id_career', $data['id_career'], PDO::PARAM_INT);
        $stmt->bindParam(':id_dept', $data['id_dept'], PDO::PARAM_INT);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollback();
        }
        return false;
    }

    static function read($table, $data)
    {
        $db = Connection::Init_connection();
        if ($data == null) {
            $stmt = $db->prepare(
                "SELECT * FROM $table"
            );
        } else {
            $stmt = $db->prepare(
                "SELECT * FROM $table WHERE ID_DEPT=:id_dept"
            );
            $stmt->bindParam(":id_dept", $data, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static function update($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "UPDATE $table SET CODIGO_CARRERA=:id_career WHERE ID_DEPT=:id_dept"
        );
        $stmt->bindParam(':id_dept', $data['id_dept'], PDO::PARAM_INT);
        $stmt->bindParam(':id_career', $data['id_career'], PDO::PARAM_INT);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollback();
        }
    }

    static function delete($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "DELETE FROM $table WHERE CODIGO_CARRERA=:id_career AND ID_DEPT=:id_dept"
        );
        $stmt->bindParam(':id_dept', $data['id_dept'], PDO::PARAM_INT);
        $stmt->bindParam(':id_career', $data['id_career'], PDO::PARAM_INT);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollback();
        }
    }
}
