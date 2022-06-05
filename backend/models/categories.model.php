<?php

require_once "connection.php";

class ModelCategories{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function showCategories($tabla, $item, $valor){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	ACTIVAR CATEGORIA
	=============================================*/

	public static function activateCategory($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function addCategory($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(category, route, state) VALUES (:category, :route, :state)");

		$stmt->bindParam(":category", $data["category"], PDO::PARAM_STR);
		$stmt->bindParam(":route", $data["route"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $data["state"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	public static function updateCategory($tabla, $datos){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET category = :category, route = :route, state = :state WHERE id = :id");

		$stmt -> bindParam(":category", $datos["category"], PDO::PARAM_STR);
		$stmt->bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $datos["state"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


}