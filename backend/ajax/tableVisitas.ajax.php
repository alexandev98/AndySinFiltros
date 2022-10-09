<?php

require_once "../controllers/visits.controller.php";
require_once "../models/visits.model.php";

class TableVisitas{

 	/*=============================================
  	MOSTRAR LA TABLA DE VISITAS
  	=============================================*/ 

 	public function mostrarTabla(){

 		$visitas = ControllerVisits::showVisits();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($visitas); $i++){

		/*=============================================
		DEVOLVER DATOS JSON
		=============================================*/

		$datosJson	 .= '[
			      "'.($i+1).'",
			      "'.$visitas[$i]["ip"].'",
			      "'.$visitas[$i]["country"].'",
			      "'.$visitas[$i]["visits"].'",
			      "'.$visitas[$i]["date"].'"    
			    ],';

		}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
		  
		}'; 

		echo $datosJson;

 	}


}

/*=============================================
ACTIVAR TABLA DE VISITAS
=============================================*/ 
$activar = new TableVisitas();
$activar -> mostrarTabla();