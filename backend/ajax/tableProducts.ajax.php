<?php

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

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
  			AGREGAR ETIQUETAS DE ESTADO
  			=============================================*/

  			if($productos[$i]["estado"] == 0){

  				$colorEstado = "btn-danger";
  				$textoEstado = "Desactivado";
  				$estadoProducto = 1;

  			}else{

  				$colorEstado = "btn-success";
  				$textoEstado = "Activado";
  				$estadoProducto = 0;

  			}

  			$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idProducto='".$productos[$i]["id"]."' estadoProducto='".$estadoProducto."'>".$textoEstado."</button>";

			/*=============================================
  			TRAER IMAGEN PRINCIPAL
  			=============================================*/

  			$imagenPrincipal = "<img src='".$productos[$i]["front"]."' class='img-thumbnail imgTablaPrincipal' width='100px'>";

  			/*=============================================
			TRAER MULTIMEDIA
  			=============================================*/

  			if($productos[$i]["multimedia"] != null){

  				$multimedia = json_decode($productos[$i]["multimedia"],true);

  				if($multimedia[0]["foto"] != ""){

  					$vistaMultimedia = "<img src='".$multimedia[0]["foto"]."' class='img-thumbnail imgTablaMultimedia' width='100px'>";

  				}else{

  					$vistaMultimedia = "<img src='http://i3.ytimg.com/vi/".$productos[$i]["multimedia"]."/hqdefault.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";

  				}


  			}else{

  				$vistaMultimedia = "<img src='vistas/img/multimedia/default/default.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";

  			}

  			/*=============================================
  			TRAER DETALLES
  			=============================================*/

  			$detalles = json_decode($productos[$i]["detalles"],true);

  			if($productos[$i]["tipo"] == "fisico"){

  				$talla = json_encode($detalles["Talla"]);
				$color = json_encode($detalles["Color"]);
				$marca = json_encode($detalles["Marca"]);

				$vistaDetalles = "Talla: ".str_replace(array("[","]",'"'), "", $talla)." - Color: ".str_replace(array("[","]",'"'), "", $color)." - Marca: ".str_replace(array("[","]",'"'), "", $marca);


  			}else{


				$vistaDetalles = "Clases: ".$detalles["Clases"].", Tiempo: ".$detalles["Tiempo"].", Nivel: ".$detalles["Nivel"].", Acceso: ".$detalles["Acceso"].", Dispositivo: ".$detalles["Dispositivo"].", Certificado: ".$detalles["Certificado"];

  			}

  			/*=============================================
  			TRAER PRECIO
  			=============================================*/

  			if($productos[$i]["precio"] == 0){

  				$precio = "Gratis";
  			
  			}else{

  				$precio = "$ ".number_format($productos[$i]["precio"],2);

  			}

  			/*=============================================
  			TRAER ENTREGA
  			=============================================*/

  			if($productos[$i]["entrega"] == 0){

  				$entrega = "Inmediata";
  			
  			}else{

  				$entrega = $productos[$i]["entrega"]. " días hábiles";

  			}

  			/*=============================================
  			REVISAR SI HAY OFERTAS
  			=============================================*/
  			
			if($productos[$i]["oferta"] != 0){

				if($productos[$i]["precioOferta"] != 0){	

					$tipoOferta = "PRECIO";
					$valorOferta = "$ ".number_format($productos[$i]["precioOferta"],2);

				}else{

					$tipoOferta = "DESCUENTO";
					$valorOferta = $productos[$i]["descuentoOferta"]." %";	

				}	

			}else{

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;
				
			}

  			/*=============================================
  			TRAER IMAGEN OFERTA
  			=============================================*/

  			if($productos[$i]["imgOferta"] != ""){

	  			$imgOferta = "<img src='".$productos[$i]["imgOferta"]."' class='img-thumbnail imgTablaProductos' width='100px'>";

	  		}else{

	  			$imgOferta = "<img src='vistas/img/ofertas/default/default.jpg' class='img-thumbnail imgTablaProductos' width='100px'>";

	  		}

	  		/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

  			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' imgOferta='".$productos[$i]["imgOferta"]."' rutaCabecera='".$productos[$i]["ruta"]."' imgPortada='".$cabeceras["portada"]."' imgPrincipal='".$productos[$i]["portada"]."'><i class='fa fa-times'></i></button></div>";

  			/*=============================================
  			CONSTRUIR LOS DATOS JSON
  			=============================================*/


			$datosJson .='[
					
					"'.($i+1).'",
					"'.$productos[$i]["titulo"].'",
					"'.$categoria.'",
					"'.$subcategoria.'",
					"'.$productos[$i]["ruta"].'",
					"'.$estado.'",
					"'.$productos[$i]["tipo"].'",
					"'.$cabeceras["descripcion"].'",
				  	"'.$cabeceras["palabrasClaves"].'",
				  	"'.$imagenPortada.'",
				  	"'.$imagenPrincipal.'",
			 	  	"'.$vistaMultimedia.'",
				  	"'.$vistaDetalles.'",
		  			"'.$precio.'",
				  	"'.$productos[$i]["peso"].' kg",
				  	"'.$entrega.'",
				  	"'.$tipoOferta.'",
				  	"'.$valorOferta.'",
				  	"'.$imgOferta.'",
				  	"'.$productos[$i]["finOferta"].'",			
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