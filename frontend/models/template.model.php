<?php

require_once "connection.php";

class TemplateModel{

    public static function styleTemplate($table){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();
    }

    public static function getHeaders($table, $route){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE route = :route");

        $stmt -> bindParam(":route", $route, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;

    }


}