<?php

require_once "connection.php";

class CartModel{

	static public function showRates($table){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt =null;

	}

}