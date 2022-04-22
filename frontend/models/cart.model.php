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

		$stmt = Connection::connect()->prepare("INSERT INTO $table (id_user, id_product, meeting_url, method, email, address, country, date_initial, time_zone) VALUES (:id_user, :id_product, :meeting_url, :method, :email, :address, :country, :date_initial, :time_zone)");

		$stmt->bindParam(":id_user", $data["idUser"], PDO::PARAM_INT);
		$stmt->bindParam(":id_product", $data["idProduct"], PDO::PARAM_INT);
		$stmt->bindParam(":meeting_url", $data["meeting_url"], PDO::PARAM_STR);
		$stmt->bindParam(":method", $data["method"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":address", $data["address"], PDO::PARAM_STR);
		$stmt->bindParam(":country", $data["country"], PDO::PARAM_STR);
		$stmt->bindParam(":date_initial", $data["date_initial"], PDO::PARAM_STR);
		$stmt->bindParam(":time_zone", $data["time_zone"], PDO::PARAM_STR);


		if($stmt -> execute()){
			return "ok";

		}else{
			return "error";
		}
		
		$stmt -> close();

		$stmt = null;

	}

}