<?php

require_once "connection.php";

class ModelOpenGraph{

	/*=============================================
	MOSTRAR CABECERAS
	=============================================*/

	public static function showOpenGraph($tabla, $item, $valor){

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
	CREAR CABECERAS
	=============================================*/

	static public function addOpenGraph($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table (route, title, description, keywords, front) VALUES (:route, :title, :description, :keywords, :front)");

		$stmt->bindParam(":route", $data["route"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $data["title"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":keywords", $data["keywords"], PDO::PARAM_STR);
		$stmt->bindParam(":front", $data["front"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;


	}

	/*=============================================
	EDITAR CABECERAS
	=============================================*/

	static public function mdlEditarCabecera($tabla, $datos){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET ruta = :ruta, titulo = :titulo, descripcion = :descripcion, palabrasClaves = :palabrasClaves, portada = :portada WHERE id = :id");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":palabrasClaves", $datos["palabrasClaves"], PDO::PARAM_STR);
		$stmt->bindParam(":portada", $datos["imgPortada"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["idCabecera"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR CABECERA
	=============================================*/

	static public function mdlEliminarCabecera($tabla, $datos){

		$stmt = Connection::connect()->prepare("DELETE FROM $tabla WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



}