<?php

require_once "connection.php";

class ModelUser{

    public static function showTotalUsers($table, $order){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
        
    }
}