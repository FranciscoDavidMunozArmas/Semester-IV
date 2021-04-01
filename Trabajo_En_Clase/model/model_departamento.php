<?php
class Model_Dept
{
    static function create($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "INSERT INTO $table VALUES(null, :nombre_dept)"
        );
        $stmt->bindParam(':nombre_dept', $data['nombre_dept'], PDO::PARAM_STR);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $row_id = $db->lastInsertId();
            $db->commit();
            return $row_id;
        } catch (PDOException $e) {
            $db->rollback();
        }
    }

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
                "SELECT * FROM $table WHERE ID_DEPT=:id_dept"
            );
            $stmt->bindParam(":id_dept", $data, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }
    }

    static function update($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "UPDATE $table SET NOMBRE_DEPT=:nombre_dept WHERE ID_DEPT=:id_dept"
        );
        $stmt->bindParam(':id_dept', $data['id_dept'], PDO::PARAM_INT);
        $stmt->bindParam(':nombre_dept', $data['nombre_dept'], PDO::PARAM_STR);
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
            "DELETE FROM $table WHERE ID_DEPT=:id_dept"
        );
        $stmt->bindParam(':id_dept', $data, PDO::PARAM_INT);
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
