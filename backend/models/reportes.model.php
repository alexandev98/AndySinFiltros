<?php

require_once "connection.php";

class ModelReportes{
		
	/*=============================================
	DESCARGAR REPORTE
	=============================================*/

	static public function descargarReporte($tabla){

		$stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}


	
}