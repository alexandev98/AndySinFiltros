<?php

require_once "../controllers/blog.controller.php";
require_once "../controllers/categories.controller.php";
require_once "../controllers/opengraph.controller.php";
require_once "../models/blog.model.php";
require_once "../models/categories.model.php";
require_once "../models/opengraph.model.php";

class TablaPosts{

  /*=============================================
  MOSTRAR LA TABLA DE PUBLICACIONES
  =============================================*/ 

  public function mostrarTablaPosts(){	

  	$item = null;
  	$valor = null;

  	$posts = ControllerBlog::showPosts($item, $valor);

  	$datosJson = '

  		{	
  			"data":[';

	 	for($i = 0; $i < count($posts); $i++){

			/*=============================================
  			TRAER LAS CATEGORÍAS
  			=============================================*/

  			$item = "id";
			$valor = $posts[$i]["id_category"];
			
			$categorias = ControllerCategories::showCategories($item, $valor);

			if($categorias["category"] == ""){

				$categoria = "SIN CATEGORÍA";
			
			}else{

				$categoria = $categorias["category"];
			}

			/*=============================================
  			AGREGAR ETIQUETAS DE ESTADO
  			=============================================*/

  			if($posts[$i]["state"] == 0){

  				$colorEstado = "btn-danger";
  				$textoEstado = "Desactivado";
  				$estadoProducto = 1;

  			}else{

  				$colorEstado = "btn-success";
  				$textoEstado = "Activado";
  				$estadoProducto = 0;

  			}

  			$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idAsesoria='".$posts[$i]["id"]."' estadoAsesoria='".$estadoProducto."'>".$textoEstado."</button>";

			/*=============================================
  			TRAER OPEN GRAPH
  			=============================================*/

  			$item3 = "route";
			$valor3 = $posts[$i]["route"];

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

  			$imagenPrincipal = "<img src='".$posts[$i]["front"]."' class='img-thumbnail imgTablaPrincipal' width='100px'>";

	  		/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

  			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPublicacion' idPublicacion='".$posts[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPublicacion'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPublicacion' idPublicacion='".$posts[$i]["id"]."' rutaOpengraph='".$posts[$i]["route"]."' imgPrincipal='".$posts[$i]["front"]."' imgPortada='".$open_graph["front"]."'><i class='fa fa-times'></i></button></div>";

  			/*=============================================
  			CONSTRUIR LOS DATOS JSON
  			=============================================*/

			$datosJson .='[
					
					"'.($i+1).'",
					"'.$posts[$i]["title"].'",
					"'.$categoria.'",
					"'.$posts[$i]["route"].'",
					"'.$estado.'",
					"'.$imagenPortada.'",
				  	"'.$imagenPrincipal.'",
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
ACTIVAR TABLA DE PUBLICACIONES
=============================================*/ 
$activarPosts = new TablaPosts();
$activarPosts -> mostrarTablaPosts();