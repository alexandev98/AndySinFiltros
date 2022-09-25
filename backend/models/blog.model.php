<?php

require_once "connection.php";

class ModelBlog{

	public static function showPosts($table, $item, $value){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

    /*=============================================
	CREAR PUBLICACION
	=============================================*/

	public static function crearPost($tabla, $datos){

		$stmt = Connection::connect()->prepare("INSERT INTO $tabla(id_category, route, state, title, text, front, multimedia) VALUES (:id_category, :route, :state, :title, :text, :front, :multimedia)");

		$stmt->bindParam(":id_category", $datos["idCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":route", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":text", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":front", $datos["imgFotoPrincipal"], PDO::PARAM_STR);
		$stmt->bindParam(":multimedia", $datos["multimedia"], PDO::PARAM_STR);
	
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



}