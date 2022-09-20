<?php

class ControllerProducts{

    public static function showTotalProducts($order){

        $table = "products";

        $response = ModelProducts::showTotalProducts($table, $order);

        return $response;

    }

    public static function showSumSales(){

        $table = "products";

        $response = ModelProducts::showSumSales($table);

        return $response;

    }

    public static function showProducts($item, $value){

		$table = "products";

		$response = ModelProducts::showProducts($table, $item, $value);

		return $response;
	
	}

	/*=============================================
	CREAR PRODUCTOS
	=============================================*/

	public static function crearAsesoria($datos){

		if(isset($datos["tituloAsesoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloAsesoria"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionAsesoria"]) ){

				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaPortada = "../views/img/open_graph/default/default.jpg";

				if(isset($datos["fotoPortada"]["tmp_name"]) && !empty($datos["fotoPortada"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPortada"]["tmp_name"]);	

					$nuevoAncho = 1280;
					$nuevoAlto = 720;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPortada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaPortada = "../views/img/open_graph/default/".$datos["rutaAsesoria"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPortada"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($datos["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaPortada = "../views/img/open_graph/default/".$datos["rutaAsesoria"].".png";

						$origen = imagecreatefrompng($datos["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}

				}

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../views/img/categories/default/default.jpg";

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 450;
					$nuevoAlto = 450;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../views/img/categories/asesorias/".$datos["rutaAsesoria"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../views/img/categories/asesorias/".$datos["rutaAsesoria"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				/*=============================================
				PREGUNTAMOS SI VIENE OFERTE EN CAMINO
				=============================================*/

				if($datos["selActivarOferta"] == "oferta"){

					$datosAsesoria = array(
						   "titulo"=>$datos["tituloAsesoria"],
						   "idCategoria"=>2,
						   "detalles"=>$datos["detalles"],		
						   "hour"=>$datos["hour"],				 
						   "ruta"=>$datos["rutaAsesoria"],
						   "estado"=> 1,
						   "titular"=> substr($datos["descripcionAsesoria"], 0, 225)."...",
						   "descripcion"=> $datos["descripcionAsesoria"],
						   "keywords"=> $datos["pClavesAsesoria"],
						   "precio"=> $datos["precio"],				
						   "imgPortada"=>substr($rutaPortada,3),
						   "imgFotoPrincipal"=>substr($rutaFotoPrincipal,3),
						   "oferta"=>1,
						   "precioOferta"=>$datos["precioOferta"],
						   "descuentoOferta"=>$datos["descuentoOferta"],
					   );

				}else{

					$datosAsesoria = array(
						   "titulo"=>$datos["tituloAsesoria"],
						   "idCategoria"=>2,
						   "detalles"=>$datos["detalles"],	
						   "hour"=>$datos["hour"],					
						   "ruta"=>$datos["rutaAsesoria"],
						   "estado"=> 1,
						   "titular"=> substr($datos["descripcionAsesoria"], 0, 225)."...",
						   "descripcion"=> $datos["descripcionAsesoria"],
						   "keywords"=> $datos["pClavesAsesoria"],
						   "precio"=> $datos["precio"],					  
						   "imgPortada"=>substr($rutaPortada,3),
						   "imgFotoPrincipal"=>substr($rutaFotoPrincipal,3),
						   "oferta"=>0,
						   "precioOferta"=>0,
						   "descuentoOferta"=>0,
						  
					   );

				}

				ModelOpenGraph::addOpenGraph("open_graph", $datosAsesoria);

				$respuesta = ModelProducts::crearAsesoria("products", $datosAsesoria);

				return $respuesta;
				

			}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "El nombre de la asesoría no puede ir vacía o llevar caracteres especiales",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "asesorias";

							}
						})

			  	</script>';

			}
		
		}

	}

    public static function updateProduct($datos){

		if(isset($datos["idAsesoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloAsesoria"])  && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionAsesoria"]) ){


				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaPortada = "../".$datos["antiguaFotoPortada"];

				if(isset($datos["fotoPortada"]["tmp_name"]) && !empty($datos["fotoPortada"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					if($datos["antiguaFotoPortada"] != "" && $datos["antiguaFotoPortada"] != "views/img/open_graph/default/default.jpg"){

						unlink("../".$datos["antiguaFotoPortada"]);	
		
					}

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPortada"]["tmp_name"]);	

					$nuevoAncho = 1280;
					$nuevoAlto = 720;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPortada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaPortada = "../views/img/open_graph/".$datos["rutaAsesoria"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPortada"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($datos["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaPortada = "../views/img/open_graph/".$datos["rutaAsesoria"].".png";

						$origen = imagecreatefrompng($datos["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}

				}

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../".$datos["antiguaFotoPrincipal"];

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO PRINCIPAL
					=============================================*/

					if($datos["antiguaFotoPrincipal"] != "" && $datos["antiguaFotoPrincipal"] != "views/img/categories/default/default.jpg"){

						unlink("../".$datos["antiguaFotoPrincipal"]);
		
					}

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 450;
					$nuevoAlto = 450;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../views/img/categories/asesorias/".$datos["rutaAsesoria"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../views/img/categories/asesorias/".$datos["rutaAsesoria"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				/*=============================================
				PREGUNTAMOS SI VIENE OFERTE EN CAMINO
				=============================================*/

				if($datos["selActivarOferta"] == "oferta"){

					$datosAsesoria = array(
								   "id"=>$datos["idAsesoria"],
								   "title"=>$datos["tituloAsesoria"],
								   "hour"=>$datos["hour"],
								   "details"=>$datos["details"],
								   "route"=>$datos["rutaAsesoria"],
								   "state"=> 1,
								   "idOpenGraph"=>$datos["idCabecera"],
								   "titular"=> substr($datos["descripcionAsesoria"], 0, 225)."...",
								   "description"=> $datos["descripcionAsesoria"],
								   "keywords"=> $datos["pClavesAsesoria"],
								   "price"=> $datos["precio"],
								   "imgOpenGraph"=>substr($rutaPortada,3),
								   "imgFotoPrincipal"=>substr($rutaFotoPrincipal,3),
								   "offer"=>1,
								   "offerPrice"=>$datos["precioOferta"],
								   "discountOffer"=>$datos["descuentoOferta"],
								   );

				}else{

					$datosAsesoria = array(
						 		   "id"=>$datos["idAsesoria"],
								   "title"=>$datos["tituloAsesoria"],
								   "hour"=>$datos["hour"],
								   "details"=>$datos["details"],
								   "route"=>$datos["rutaAsesoria"],
								   "state"=> 1,
								   "idOpenGraph"=>$datos["idCabecera"],
								   "titular"=> substr($datos["descripcionAsesoria"], 0, 225)."...",
								   "description"=> $datos["descripcionAsesoria"],
								   "keywords"=> $datos["pClavesAsesoria"],
								   "price"=> $datos["precio"],
								   "imgOpenGraph"=>substr($rutaPortada,3),
								   "imgFotoPrincipal"=>substr($rutaFotoPrincipal,3),
								   "offer"=>0,
								   "offerPrice"=>0,
								   "discountOffer"=>0,
								  
								   );

				}

				ModelOpenGraph::updateOpenGraph("open_graph", $datosAsesoria);

				$respuesta = ModelProducts::editProduct("products", $datosAsesoria);

				return $respuesta;


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre de la asesoría no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "asesorias";

							}
						})

			  	</script>';

			  

			}

		}
		
	}

	/*=============================================
	ELIMINAR ASESORIA
	=============================================*/

	public static function eliminarAsesoria(){

		

		if(isset($_GET["idAsesoria"])){

			$datos = $_GET["idAsesoria"];

			/*=============================================
			ELIMINAR FOTO PRINCIPAL
			=============================================*/

			if($_GET["imgPrincipal"] != "" && $_GET["imgPrincipal"] != "views/img/categories/default/default.jpg"){

				unlink($_GET["imgPrincipal"]);		

			}

			/*=============================================
			ELIMINAR OPEN GRAPH
			=============================================*/

			if($_GET["imgPortada"] != "" && $_GET["imgPortada"] != "views/img/open_graph/default/default.jpg"){

				unlink($_GET["imgPortada"]);		

			}

			ModelOpenGraph::eliminarOpenGraph("open_graph", $_GET["rutaOpengraph"]);

			$respuesta = ModelProducts::eliminarAsesoria("products", $datos);

			

			if($respuesta == "ok"){

				

				

				echo'<script>

				swal({
					  type: "success",
					  title: "La asesoría ha sido eliminada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "asesorias";

								}
							})

				</script>';

			}		



		}

	}
}