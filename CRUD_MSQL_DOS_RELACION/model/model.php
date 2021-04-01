<?php
class Model
{

    //Create
    static function create_employee($table, $data)
    {
        $stmt = Connection::init_connection()->prepare(
            "INSERT INTO $table(nombre, departamento) values (:nombre, :departamento)"
        );
        $stmt->bindParam(':nombre', $data["name"]);
        $stmt->bindParam(':departamento', $data["dep_id"]);
        if ($stmt->execute()) {
            return true;
        }
    }
    //Read
    static function read($table, $item, $value)
    {
        if ($item == null && $value == null) {
            $stmt = Connection::init_connection()->prepare(
                "SELECT * FROM $table"
            );
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Connection::init_connection()->prepare(
                "SELECT * FROM $table WHERE $item=:item"
            );
            $stmt->bindParam(':item', $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }
    }
    static function read_employee_dep($table_1, $table_2)
    {
        $stmt = Connection::init_connection()->prepare(
            "SELECT $table_1.id, $table_1.nombre AS empleado, $table_2.nombre AS departamento FROM $table_1, $table_2 WHERE $table_1.departamento=$table_2.id"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }
    //Update
    static function update_employee($table, $data)
    {
        $stmt = Connection::init_connection()->prepare(
            "UPDATE $table SET nombre=:nombre, departamento=:departamento WHERE id=:id"
        );
        $stmt->bindParam(':id', $data["id"]);
        $stmt->bindParam(':nombre', $data["name"]);
        $stmt->bindParam(':departamento', $data["dep_id"]);
        if ($stmt->execute()) {
            return true;
        }
    }
    //Delete
    static function delete_employee($table, $data)
    {
        $stmt = Connection::init_connection()->prepare(
            "DELETE FROM $table WHERE id=:id"
        );
        $stmt->bindParam(':id', $data["id"]);
        if ($stmt->execute()) {
            return true;
        }
    }
}
