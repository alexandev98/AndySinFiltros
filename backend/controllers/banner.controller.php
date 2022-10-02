<?php

class ControllerBanner{

	/*=============================================
	MOSTRAR BANNER
	=============================================*/

	public static function showBanner($item, $valor){

		$table = "banner";

		$respuesta = ModelBanner::showBanner($table, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR BANNER
	=============================================*/

	public static function crearBanner($datos){

		if(isset($_POST["type"])){

			/*=============================================
			VALIDAR IMAGEN BANNER
			=============================================*/

			$rutaBanner = "../views/img/banner/default/default.jpg";

			if(isset($datos["fotoBanner"]["tmp_name"]) && !empty($datos["fotoBanner"]["tmp_name"])){

				/*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/

				list($ancho, $alto) = getimagesize($datos["fotoBanner"]["tmp_name"]);

				$nuevoAncho = 1600;
				$nuevoAlto = 550;

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/	

				if($datos["fotoBanner"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$rutaBanner = "../views/img/banner/".$datos["route"].".jpg";

					$origen = imagecreatefromjpeg($datos["fotoBanner"]["tmp_name"]);	

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaBanner);

				}

				if($datos["fotoBanner"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$rutaBanner = "../views/img/banner/".$datos["route"].".png";

					$origen = imagecreatefrompng($datos["fotoBanner"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaBanner);

				}

			}

			$datos = array("route"=>$datos["route"],
						   "type"=>$datos["type"],
						   "state"=>$datos["state"],
						   "img"=>substr($rutaBanner,3),
						   "style"=>$datos["style"],
						   "title1"=>$datos["title1"],
						   "title2"=>$datos["title2"],
						   "title3"=>$datos["title3"]);

						  

			$respuesta = ModelBanner::crearBanner("banner", $datos);

			return $respuesta;

		}

	}


	/*=============================================
	EDITAR BANNER
	=============================================*/

	public static function updateBanner($datos){

		if(isset($datos["id"])){

			/*=============================================
			VALIDAR IMAGEN BANNER
			=============================================*/

			$rutaBanner = $datos["antiguaFotoBanner"];

			if(isset($datos["fotoBanner"]["tmp_name"]) && !empty($datos["fotoBanner"]["tmp_name"])){

				/*=============================================
				BORRAMOS ANTIGUA FOTO PORTADA
				=============================================*/

				if($datos["antiguaFotoBanner"] != "" && $datos["antiguaFotoBanner"] != "views/img/banner/default/default.jpg"){

					unlink("../".$datos["antiguaFotoBanner"]);	
	
				}

				/*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/

				list($ancho, $alto) = getimagesize($datos["fotoBanner"]["tmp_name"]);

				$nuevoAncho = 1600;
				$nuevoAlto = 550;

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/	

				if($datos["fotoBanner"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$rutaBanner = "../views/img/banner/".$datos["route"].".jpg";

					$origen = imagecreatefromjpeg($datos["fotoBanner"]["tmp_name"]);	

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaBanner);

				}

				if($datos["fotoBanner"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$rutaBanner = "../views/img/banner/".$datos["route"].".png";

					$origen = imagecreatefrompng($datos["fotoBanner"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaBanner);

				}

			}

			$datosBanner = array("id"=>$datos["id"],
								 "route"=>$datos["route"],
								 "type"=>$datos["type"],
								 "img"=>substr($rutaBanner,3),
								 "style"=>$datos["style"],
								 "title1"=>$datos["title1"],
								 "title2"=>$datos["title2"],
								 "title3"=>$datos["title3"]);

			$respuesta = ModelBanner::updateBanner("banner", $datosBanner);

			return $respuesta;


		}

	}

	/*=============================================
	ELIMINAR BANNER
	=============================================*/

	public static function eliminarBanner(){

		if(isset($_GET["idBanner"])){

			/*=============================================
			ELIMINAR FOTO PRINCIPAL
			=============================================*/

			if($_GET["imgBanner"] != "" && $_GET["imgBanner"] != "views/img/default/default.jpg"){

				unlink($_GET["imgBanner"]);		

			}

			$respuesta = ModelBanner::eliminarBanner("banner", $_GET["idBanner"]);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El banner ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "banner";

								}
							})

				</script>';

			}		


		}

	}



}