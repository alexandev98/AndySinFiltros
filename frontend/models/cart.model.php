<?php

require_once "connection.php";

class CartModel{

	public static function showRates($table){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt =null;

	}

	public static function newPurchases($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table (id_user, id_product) VALUES (:id_user, :id_product)");

		$stmt->bindParam(":id_user", $data["idUser"], PDO::PARAM_INT);
		$stmt->bindParam(":id_product", $data["idProduct"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";

		}else{
			return "error";
		}
		
		$stmt -> close();

		$stmt = null;

	}

}