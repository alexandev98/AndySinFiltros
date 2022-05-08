<?php

require_once "connection.php";

class ModelSales{

    public static function showTotalSales($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(payment) as total FROM $table");

        $stmt->execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;

    }
}