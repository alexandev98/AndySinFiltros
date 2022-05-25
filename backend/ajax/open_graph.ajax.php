<?php

require_once "../controllers/opengraph.controller.php";
require_once "../models/opengraph.model.php";

class AjaxOpenGraph{

	/*=============================================
	EDITAR CABECERAS
	=============================================*/	
	public $ruta;

	public function updateOpenGraph(){

		$item = "route";
		$valor = $this->ruta;

		$respuesta = ControllerOpenGraph::showOpenGraph($item, $valor);

		echo json_encode($respuesta);

	}


}

/*=============================================
EDITAR CABECERAS
=============================================*/
if(isset($_POST["route"])){

	$editar = new AjaxOpenGraph();
	$editar -> ruta = $_POST["route"];
	$editar -> updateOpenGraph();

}