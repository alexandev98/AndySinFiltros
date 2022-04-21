<?php

require_once "connection.php";

class BookingModel{

    public static function showBookings($table1, $table2, $value){

        $stmt = Connection::connect()->prepare("SELECT $table1.*, $table2.* FROM $table1 INNER JOIN $table2 ON $table1.id_product = $table2.id WHERE id_product = :id_product");

		$stmt -> bindParam(":id_product", $value, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
    }
   
}


