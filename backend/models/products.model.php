<?php

require_once "connection.php";

class ModelProducts{

    public static function showTotalProducts($table, $order){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
        
    }

    public static function showSumSales($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(sales) as total FROM $table");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
        
    }
}