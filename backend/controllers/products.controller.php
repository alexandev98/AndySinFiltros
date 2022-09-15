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

					unlink("../".$datos["antiguaFotoPortada"]);

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

						$rutaPortada = "../vistas/img/cabeceras/".$datos["rutaProducto"].".jpg";

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

						$rutaPortada = "../vistas/img/cabeceras/".$datos["rutaProducto"].".png";

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

					unlink("../".$datos["antiguaFotoPrincipal"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 400;
					$nuevoAlto = 450;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/productos/".$datos["rutaProducto"].".jpg";

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

						$rutaFotoPrincipal = "../vistas/img/productos/".$datos["rutaAsesoria"].".png";

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
								   "idCategoria"=>$datos["categoria"],
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
								   "idCategoria"=>$datos["categoria"],
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
						  title: "¡El nombre del producto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';

			  

			}

		}
		
	}
}