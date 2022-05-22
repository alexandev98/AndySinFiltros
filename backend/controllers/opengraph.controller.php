<?php

class ControllerOpenGraph{

	/*=============================================
	MOSTRAR CABECERAS
	=============================================*/

	static public function showOpenGraph($item, $valor){

		$tabla = "open_graph";

		$respuesta = ModelOpenGraph::showOpenGraph($tabla, $item, $valor);

		return $respuesta;

	}

}