<?php

require_once "connection.php";

class ModelVisit{

    public static function showTotalVisits($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(quantity) as total FROM $table");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    public static function showCountries($table, $order){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();
        
    }
}