<?php

class Model
{

    public static function create($table, $data)
    {
        $stmt = Connection::Init_connection()->prepare("INSERT INTO $table(name, surname, user_id) VALUES (:name, :surname, :user_id)");
        $stmt->bindParam(":name", $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":surname", $data["surname"], PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
    }

    public static function read($table, $column, $data)
    {
        $stmt = Connection::Init_connection()->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function update($table, $data)
    {
        $stmt = Connection::Init_connection()->prepare("UPDATE $table SET name=:name, surname=:surname, user_id=:user_id WHERE id=:id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":surname", $data["surname"], PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        }
    }

    public static function delete($table, $data)
    {
        $stmt = Connection::Init_connection()->prepare("DELETE FROM $table WHERE id=:id");
        $stmt->bindParam(":id", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        }
    }
}
