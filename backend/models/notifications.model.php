<?php

require_once "connection.php";

class ModelNotifications{
		
	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	public static function showNotifications($tabla){

		$stmt = Connection::connect()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	ACTUALIZAR NOTIFICACIONES
	=============================================*/

	public static function updateNotifications($tabla, $item, $valor){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}