<?php

class ControllerAdmin{

    public static function loginAdmin(){

        if(isset($_POST["ingEmail"])){

            if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $table = "administrators";
                $item = "email";
                $value = $_POST["ingEmail"];

                $response = ModelAdministrators::showAdministrators($table, $item, $value);

                if(is_array($response) && $response["email"] == $_POST["ingEmail"] && $response["password"] == $encriptar){

                    $_SESSION["validateSesionBackend"] = "ok";
                    $_SESSION["idBackend"] = $response["id"];
                    $_SESSION["nameBackend"] = $response["name"];
                    $_SESSION["photoBackend"] = $response["photo"];
                    $_SESSION["emailBackend"] = $response["email"];
                    $_SESSION["passwordBackend"] = $response["password"];
                    $_SESSION["profileBackend"] = $response["profile"];

                    echo '
                    
                    <script>
                    
                        window.location = "inicio";

                    </script>';

                }else{
                    echo '<br> <div class="alert alert-danger">Error al ingresar, vuelva a intentarlo</div>';
                } 
            
            }
        }
    }

    /*=============================================
	MOSTRAR ADMINISTRADORES
	=============================================*/

	static public function showAdmins($item, $valor){

		$tabla = "administrators";

		$respuesta = ModelAdministrators::showAdministrators($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR PERFIL
	=============================================*/

	public static function editarPerfil(){

		if(isset($_POST["idPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 600;
					$nuevoAlto = 600;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/profiles/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/profiles/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				/*=============================================
				SUBIR FOTO PAGINA
				=============================================*/

				$rutaFotoPagina = $_POST["fotoActualPagina"];

				if(isset($_FILES["editarFotoPagina"]["tmp_name"]) && !empty($_FILES["editarFotoPagina"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFotoPagina"]["tmp_name"]);

					$nuevoAncho = 600;
					$nuevoAlto = 600;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActualPagina"])){

						unlink($_POST["fotoActualPagina"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFotoPagina"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPagina = "views/img/profiles/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFotoPagina"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPagina);

					}

					if($_FILES["editarFotoPagina"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPagina = "views/img/profiles/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFotoPagina"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPagina);

					}

				}

				$tabla = "administrators";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'
                        
                        <script>

                            swal({
                                    type: "error",
                                    title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                    }).then(function(result) {
                                    if (result.value) {

                                    window.location = "perfiles";

                                    }
                                })

                        </script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("id" => $_POST["idPerfil"],
							   "name" => $_POST["editarNombre"],
							   "email" => $_POST["editarEmail"],
							   "password" => $encriptar,
							   "profile" => $_POST["editarPerfil"],
							   "title_about_me" => $_POST["editarTitulo"],
							   "about_me" =>  str_replace(array("\r\n", "\n", "\r"), '<br/>', $_POST["editarDescripcion"]),
							   "profile" => $_POST["editarPerfil"],
							   "photo" => $ruta,
							   "photoPagina" => $rutaFotoPagina);

				$respuesta = ModelAdministrators::editarPerfil($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El perfil ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "perfil";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "perfil";

							}
						})

			  	</script>';

			}

		}

	}


}