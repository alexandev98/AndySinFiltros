<?php

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class TableUsuarios{

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

	public function mostrarTabla(){	

		$item = null;
 		$valor = null;

 		$usuarios = ControllerUsers::showUsers($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($usuarios); $i++){

	 		/*=============================================
			TRAER FOTO USUARIO
			=============================================*/

			if($usuarios[$i]["photo"] != "" ){

				$foto = "<img class='img-circle' src='".$usuarios[$i]["photo"]."' width='60px'>";

			}else{

				$foto = "<img class='img-circle' src='views/img/users/default/anonymous.png' width='60px'>";
			}

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/

  			if($usuarios[$i]["mode"] == "directo"){

	  			if( $usuarios[$i]["verification"] == 1){

	  				$colorEstado = "label-warning";
	  				$textoEstado = "Desactivado";

	  			}else{

	  				$colorEstado = "label-success";
	  				$textoEstado = "Activado";

	  			}

	  			$estado = "<span class='label ".$colorEstado."'>".$textoEstado."</span>";

	  		}else{

	  			$estado = "<span class='label label-success'>Activado</span>";

	  		}


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$usuarios[$i]["name"].'",
				      "'.$usuarios[$i]["email"].'",
				      "'.$usuarios[$i]["mode"].'",
				      "'.$foto.'",
				      "'.$estado.'",
				      "'.$usuarios[$i]["date"].'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE VENTAS
=============================================*/ 
$activar = new TableUsuarios();
$activar -> mostrarTabla();



