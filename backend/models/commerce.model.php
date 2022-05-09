<?php

require_once "connection.php";

class ModelCommerce{

    public static function selectTemplate($table){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }


}