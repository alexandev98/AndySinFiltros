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

	public static function updatePosts($tabla, $item1, $valor1, $item2, $valor2){

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
	CREAR PUBLICACION
	=============================================*/

	public static function crearPost($tabla, $datos){

		$stmt = Connection::connect()->prepare("INSERT INTO $tabla(id_category, route, state, title, titular, text, front, multimedia) VALUES (:id_category, :route, :state, :title, :titular, :text, :front, :multimedia)");

		$stmt->bindParam(":id_category", $datos["idCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":route", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":titular", $datos["titular"], PDO::PARAM_STR);
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

	/*=============================================
	EDITAR PUBLICACION
	=============================================*/

	public static function editPost($tabla, $datos){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET route = :route, title = :title, titular = :titular, text = :text, multimedia = :multimedia, front = :front WHERE id = :id");

		
		$stmt->bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt->bindParam(":titular", $datos["titular"], PDO::PARAM_STR);
		$stmt->bindParam(":text", $datos["description"], PDO::PARAM_STR);
		$stmt->bindParam(":multimedia", $datos["multimedia"], PDO::PARAM_STR);
		$stmt->bindParam(":front", $datos["front"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
			
		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR PUBLICACION
	=============================================*/

	public static function eliminarPublicacion($tabla, $datos){

		$stmt = Connection::connect()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}