<?php

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

require_once "../controllers/opengraph.controller.php";
require_once "../models/opengraph.model.php";

class TablaCategorias{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$categorias = ControllerCategories::showCategories($item, $valor);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($categorias); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $categorias[$i]["state"] == 0){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoCategoria = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoCategoria = 0;

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoCategoria='".$estadoCategoria."' idCategoria='".$categorias[$i]["id"]."'>".$textoEstado."</button>";

		 	/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/ 

			$item = "route";
			$valor = $categorias[$i]["route"];

			$opengraph = ControllerOpenGraph::showOpenGraph($item, $valor);

			if($opengraph["front"] != ""){

				 $imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='".$opengraph["front"]."' width='100px'>";

			}else{

				$imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='views/img/open_graph/default/default.jpg' width='100px'>";
			}


			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
	    
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='".$categorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='".$categorias[$i]["id"]."' imgPortada='".$opengraph["front"]."'  rutaCabecera='".$categorias[$i]["route"]."'><i class='fa fa-times'></i></button></div>";
				    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$categorias[$i]["category"].'",
				      "'.$categorias[$i]["route"].'",
				      "'. $estado.'",
				      "'.$opengraph["description"].'",
				      "'.$opengraph["keywords"].'",
                      "'.$imgPortada.'",
				      "'.$acciones.'"		    
				    ],';

	}

	$datosJson = substr($datosJson, 0, -1);

	$datosJson.=  ']
		  
	}'; 

	echo $datosJson;


 	}


}

/*=============================================
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/ 
$activar = new TablaCategorias();
$activar -> mostrarTabla();