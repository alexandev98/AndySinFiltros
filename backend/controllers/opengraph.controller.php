<?php

class ControllerOpenGraph{

	/*=============================================
	MOSTRAR CABECERAS
	=============================================*/

	public static function showOpenGraph($item, $valor){

		$tabla = "open_graph";

		$respuesta = ModelOpenGraph::showOpenGraph($tabla, $item, $valor);

		return $respuesta;

	}

	

}