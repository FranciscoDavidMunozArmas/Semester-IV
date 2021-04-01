<?php
class Form_Career
{
    public static function select($value)
    {
        $table = "CARRERA";
        $response = Model_Career::read($table, $value);
        return $response;
    }
}
