<?php

require_once "connection.php";

class ModelBanner{

	/*=============================================
	MOSTRAR BANNER
	=============================================*/

	public static function showBanner($tabla, $item, $valor){

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
	ACTIVAR BANNER
	=============================================*/

	public static function activarBanner($tabla, $item1, $valor1, $item2, $valor2){

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
	CREAR BANNER
	=============================================*/

	public static function crearBanner($tabla, $datos){

		$stmt =Connection::connect()->prepare("INSERT INTO $tabla(route, type, img, state, title1, title2, title3, style) VALUES (:route, :type, :img, :state, :title1, :title2, :title3, :style)");

		$stmt->bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt->bindParam(":type", $datos["type"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $datos["state"], PDO::PARAM_STR);
		$stmt->bindParam(":title1", $datos["title1"], PDO::PARAM_STR);
		$stmt->bindParam(":title2", $datos["title2"], PDO::PARAM_STR);
		$stmt->bindParam(":title3", $datos["title3"], PDO::PARAM_STR);
		$stmt->bindParam(":style", $datos["style"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR BANNER
	=============================================*/

	static public function updateBanner($tabla, $datos){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET route = :route, type = :type, img = :img, style = :style, title1 = :title1, title2 = :title2, title3 = :title3 WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt->bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt->bindParam(":type", $datos["type"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt->bindParam(":style", $datos["style"], PDO::PARAM_STR);
		$stmt->bindParam(":title1", $datos["title1"], PDO::PARAM_STR);
		$stmt->bindParam(":title2", $datos["title2"], PDO::PARAM_STR);
		$stmt->bindParam(":title3", $datos["title3"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR BANNER
	=============================================*/

	static public function eliminarBanner($tabla, $datos){

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