<?php

class ControllerBlog{


	public static function showPosts($item, $value){

		$table = "blog";

		$response = ModelBlog::showPosts($table, $item, $value);

		return $response;
	
	}

	/*=============================================
	SUBIR MULTIMEDIA
	=============================================*/

	static public function subirMultimedia($datos, $ruta){

		if(isset($datos["tmp_name"]) && !empty($datos["tmp_name"])){

			/*=============================================
			DEFINIMOS LAS MEDIDAS
			=============================================*/

			list($ancho, $alto) = getimagesize($datos["tmp_name"]);	

			$nuevoAncho = 1000;
			$nuevoAlto = 1000;

			/*=============================================
			CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DE LA MULTIMEDIA
			=============================================*/

			$directorio = "../views/img/multimedia/".$ruta;
			
			/*=============================================
			PRIMERO PREGUNTAMOS SI EXISTE UN DIRECTORIO DE MULTIMEDIA CON ESTA RUTA
			=============================================*/

			if (!file_exists($directorio)){

				mkdir($directorio, 0755);
			
			}

			/*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

			if($datos["type"] == "image/jpeg"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origen = imagecreatefromjpeg($datos["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $rutaMultimedia);

			}

			if($datos["type"] == "image/png"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origen = imagecreatefrompng($datos["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagealphablending($destino, FALSE);
		
				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $rutaMultimedia);

			}

			return $rutaMultimedia;	

		}

	}

    /*=============================================
	CREAR PUBLICACION
	=============================================*/

	public static function crearPost($datos){

		if(isset($datos["tituloPost"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloPost"])){

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

						$rutaPortada = "../views/img/open_graph/".$datos["rutaPost"].".jpg";

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

						$rutaPortada = "../views/img/open_graph/".$datos["rutaPost"].".png";

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

						$rutaFotoPrincipal = "../views/img/categories/blog/".$datos["rutaPost"].".jpg";

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

						$rutaFotoPrincipal = "../views/img/categories/blog/".$datos["rutaPost"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

                $datosPost = array(
                        "titulo"=>$datos["tituloPost"],
                        "idCategoria"=>6,
                        "ruta"=>$datos["rutaPost"],
                        "estado"=> 1,
                        "titular"=> substr($datos["textoPost"], 0, 225)."...",
                        "descripcion"=> $datos["textoPost"],
                        "keywords"=> $datos["pClavesPost"],
						"multimedia"=> $datos["multimedia"],
                        "imgPortada"=>substr($rutaPortada,3),
                        "imgFotoPrincipal"=>substr($rutaFotoPrincipal,3)
                );

				ModelOpenGraph::addOpenGraph("open_graph", $datosPost);

				$respuesta = ModelBlog::crearPost("blog", $datosPost);

				return $respuesta;
				

			}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "El nombre de la publicación no puede ir vacía o llevar caracteres especiales",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "blog";

							}
						})

			  	</script>';

			}
		
		}

	}

	/*=============================================
	EDITAR PUBLICACION
	=============================================*/

	public static function updatePost($datos){

		if(isset($datos["idPublicacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloPublicacion"])  && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["textoPublicacion"]) ){

				/*=============================================
				ELIMINAR LAS FOTOS DE MULTIMEDIA DE LA CARPETA
				=============================================*/

				$item = "id";
				$valor = $datos["idPublicacion"];

				$traerPost = ModelBlog::showPosts("blog", $item, $valor);

				foreach ($traerPost as $key => $value) {
				
					$multimediaBD = json_decode($value["multimedia"],true);
					$multimediaEditar = json_decode($datos["multimedia"],true);

					$objectMultimediaBD = array();
					$objectMultimediaEditar = array();

					if(is_array($multimediaBD)){

						foreach ($multimediaBD as $key => $value) {

							array_push($objectMultimediaBD, $value);
	
						}

					}
				

					if(is_array($multimediaEditar)){

						foreach ($multimediaEditar as $key => $value) {

							array_push($objectMultimediaEditar, $value);

						}

					}
					

					$borrarFoto = array_diff($objectMultimediaBD, $objectMultimediaEditar);
					
					foreach ($borrarFoto as $key => $value) {
						
						unlink("../".$value);

					}

				}	
				
				
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

						$rutaPortada = "../views/img/open_graph/".$datos["rutaPublicacion"].".jpg";

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

						$rutaPortada = "../views/img/open_graph/".$datos["rutaPublicacion"].".png";

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

						$rutaFotoPrincipal = "../views/img/categories/blog/".$datos["rutaPublicacion"].".jpg";

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

						$rutaFotoPrincipal = "../views/img/categories/blog/".$datos["rutaProducto"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				$datosPublicacion = array(
								"id"=>$datos["idPublicacion"],
								"title"=>$datos["tituloPublicacion"],
								"multimedia"=>$datos["multimedia"],
								"route"=>$datos["rutaPublicacion"],
								"idOpenGraph"=>$datos["idCabecera"],
								"titular"=> substr($datos["textoPublicacion"], 0, 225)."...",
								"description"=> $datos["textoPublicacion"],
								"keywords"=> $datos["pClavesPublicacion"],
								"imgOpenGraph"=>substr($rutaPortada,3),
								"front"=>substr($rutaFotoPrincipal,3),
								);

			
				
				ModelOpenGraph::updateOpenGraph("open_graph", $datosPublicacion);

				$respuesta = ModelBlog::editPost("blog", $datosPublicacion);

				return $respuesta;

			}else{

				echo'<script>

					swal({
							type: "error",
							title: "El nombre de la publicación no puede ir vacío o llevar caracteres especiales",
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

	/*=============================================
	ELIMINAR PUBLICACION
	=============================================*/

	public static function eliminarPublicacion(){

		if(isset($_GET["idPublicacion"])){

			/*=============================================
			ELIMINAR MULTIMEDIA
			=============================================*/

			$borrar = glob("views/img/multimedia/".$_GET["rutaCabecera"]."/*");

			foreach($borrar as $file){

				unlink($file);

			}

			rmdir("views/img/multimedia/".$_GET["rutaCabecera"]);

			$datos = $_GET["idPublicacion"];

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

			$respuesta = ModelBlog::eliminarPublicacion("blog", $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La asesoría ha sido eliminada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "blog";

								}
							})

				</script>';

			}		



		}

	}

	

}


