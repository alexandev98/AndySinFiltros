<?php

require_once "../controllers/products.controller.php";
require_once "../controllers/categories.controller.php";
require_once "../controllers/opengraph.controller.php";
require_once "../models/products.model.php";
require_once "../models/categories.model.php";
require_once "../models/opengraph.model.php";

class TablaProductos{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/ 

  public function mostrarTablaProductos(){	

  	$item = null;
  	$valor = null;

  	$productos = ControllerProducts::showProducts($item, $valor);

  	$datosJson = '

  		{	
  			"data":[';

	 	for($i = 0; $i < count($productos); $i++){

			/*=============================================
  			TRAER LAS CATEGORÍAS
  			=============================================*/

  			$item = "id";
			$valor = $productos[$i]["id_category"];
			
			$categorias = ControllerCategories::showCategories($item, $valor);

			if($categorias["category"] == ""){

				$categoria = "SIN CATEGORÍA";
			
			}else{

				$categoria = $categorias["category"];
			}

			
			/*=============================================
  			AGREGAR ETIQUETAS DE ESTADO
  			=============================================*/

  			if($productos[$i]["state"] == 0){

  				$colorEstado = "btn-danger";
  				$textoEstado = "Desactivado";
  				$estadoProducto = 1;

  			}else{

  				$colorEstado = "btn-success";
  				$textoEstado = "Activado";
  				$estadoProducto = 0;

  			}

  			$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idAsesoria='".$productos[$i]["id"]."' estadoAsesoria='".$estadoProducto."'>".$textoEstado."</button>";


			/*=============================================
  			TRAER OPEN GRAPH
  			=============================================*/

  			$item3 = "route";
			$valor3 = $productos[$i]["route"];

			$open_graph = ControllerOpenGraph::showOpenGraph($item3, $valor3);

			if(!is_array($open_graph)){

				$open_graph = array("front"=>"",
									"description"=>"",
									"keywords"=>"");

				

			}

			if($open_graph["front"] != ""){

				$imagenPortada = "<img src='".$open_graph["front"]."' class='img-thumbnail imgPortada' width='100px'>";
				
			}else{

				$imagenPortada = "<img src='views/img/open_graph/default/default.jpg' class='img-thumbnail imgPortada' width='100px'>";
			}

		
			
			
			/*=============================================
  			TRAER IMAGEN PRINCIPAL
  			=============================================*/

  			$imagenPrincipal = "<img src='".$productos[$i]["front"]."' class='img-thumbnail imgTablaPrincipal' width='100px'>";

  			/*=============================================
  			TRAER PRECIO
  			=============================================*/

  			if($productos[$i]["price"] == 0){

  				$precio = "No tiene precio";
  			
  			}else{

  				$precio = "$ ".number_format($productos[$i]["price"],2);

  			}

  			/*=============================================
  			REVISAR SI HAY OFERTAS
  			=============================================*/
  			
			if($productos[$i]["offer"] != 0){

				if($productos[$i]["offerPrice"] != 0){	

					$tipoOferta = "PRECIO";
					$valorOferta = "$ ".number_format($productos[$i]["offerPrice"],2);

				}else{

					$tipoOferta = "DESCUENTO";
					$valorOferta = $productos[$i]["discountOffer"]." %";	

				}	

			}else{

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;
				
			}

	  		/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

  			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarAsesoria' idAsesoria='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarAsesoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarAsesoria' idAsesoria='".$productos[$i]["id"]."' rutaOpengraph='".$productos[$i]["route"]."' imgPrincipal='".$productos[$i]["front"]."' imgPortada='".$open_graph["front"]."'><i class='fa fa-times'></i></button></div>";

  			/*=============================================
  			CONSTRUIR LOS DATOS JSON
  			=============================================*/


			$datosJson .='[
					
					"'.($i+1).'",
					"'.$productos[$i]["title"].'",
					"'.$categoria.'",
					"'.$productos[$i]["route"].'",
					"'.$estado.'",
					"'.$imagenPortada.'",
				  	"'.$imagenPrincipal.'",
					"'.$precio.'",
					"'.$tipoOferta.'",
					"'.$valorOferta.'",
				  	"'.$acciones.'"	   

			],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;

  }


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();