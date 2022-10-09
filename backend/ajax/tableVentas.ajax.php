<?php

require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class TablaVentas{

  /*=============================================
  MOSTRAR LA TABLA DE VENTAS
  =============================================*/

  public function mostrarTabla(){	

  	$ventas = ControllerSales::showSales();

  	$datosJson = '{
		 
	 "data": [ ';

	for($i = 0; $i < count($ventas); $i++){

		/*=============================================
		TRAER PRODUCTO
		=============================================*/

		$item = "id";
		$valor = $ventas[$i]["id_product"];

		$traerProducto = ControllerProducts::showProducts($item, $valor);

		$producto = $traerProducto[0]["title"];

		$imgProducto = "<img class='img-thumbnail' src='".$traerProducto[0]["front"]."' width='100px'>";


		/*=============================================
		TRAER CLIENTE
		=============================================*/

		$item2 = "id";
		$valor2 = $ventas[$i]["id_user"];

		$traerCliente = ControllerUsers::showUsers($item2, $valor2);

		$cliente = $traerCliente["name"];

		/*=============================================
		TRAER FOTO CLIENTE
		=============================================*/

		if($traerCliente["photo"] != ""){

			$imgCliente = "<img class='img-circle' src='".$traerCliente["photo"]."' width='70px'>";

		}else{

			$imgCliente = "<img class='img-circle' src='vistas/img/usuarios/default/anonymous.png' width='70px'>";
		}

		/*=============================================
		TRAER EMAIL CLIENTE
		=============================================*/

		if($ventas[$i]["email"] == ""){

			$email = $traerCliente["email"];

		}else{

			$email = $ventas[$i]["email"];
		}

		/*=============================================
		LOGOS PAYPAL Y PAYU
		=============================================*/

		if($ventas[$i]["method"] == "paypal"){

			$metodo = "<img class='img-responsive' src='views/img/template/paypal.jpg' width='150px'>";
		
		}else if($ventas[$i]["metodo"] == "payu"){

			$metodo = "<img class='img-responsive' src='vistas/img/plantilla/payu.jpg' width='300px'>";
		
		}else{

			$metodo = "GRATIS";

		}

        /*=============================================
		ENLACE DE ZOOM
		=============================================*/

		$enlaceZoom = "<a href=".$ventas[$i]["meeting_url"].">Link de Zoom</a>";

        /*=============================================
		FECHA Y HORA ASESORIA
		=============================================*/

		$fechaHoraAsesoria = $ventas[$i]["date_initial"]." <br>".$ventas[$i]["time_zone"];

		/*=============================================
		DEVOLVER DATOS JSON
		=============================================*/
		$datosJson	 .= '[
			      		"'.($i+1).'",
			      		"'.$producto.'",
			      		"'.$imgProducto.'",
			      		"'.$cliente.'",
			      		"'.$imgCliente.'",
			      		"$'.number_format($ventas[$i]["payment"],2).'",
			      		"'.$metodo.'",
                        "'.$fechaHoraAsesoria.'",
                        "'.$enlaceZoom.'",		
			      		"'.$email.'",
			      		"'.$ventas[$i]["address"].'",
			      		"'.$ventas[$i]["country"].'",
			      		"'.$ventas[$i]["date"].'"	
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
$activar = new TablaVentas();
$activar -> mostrarTabla(); 
