<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ControllerUsers{

    //REGISTER USER

    public static function ctrRegisterUser(){

        if(isset($_POST["regUser"])){

            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUser"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){

               $encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

               $encriptarEmail = md5($_POST["regEmail"]);

               $data = array("name"=>$_POST["regUser"],
                             "email"=>$_POST["regEmail"],
                             "password"=>$encriptar,
                             "mode"=>"directo",
                             "photo"=>"",
                             "verification"=>1,
                             "emailCrypt"=>$encriptarEmail);

                $table = "users";

                $response = UserModel::registerUser($table, $data);

                if($response == "ok"){

                    /*=============================================
					ACTUALIZAR NOTIFICACIONES NUEVOS USUARIOS
					=============================================*/

					$traerNotificaciones = ControllerNotifications::showNotifications();

					$nuevoUsuario = $traerNotificaciones["nuevosUsuarios"] + 1;

					ModelNotifications::updateNotifications("notifications", "nuevosUsuarios", $nuevoUsuario);

                    /*=============================================
					VERIFICACIÓN CORREO ELECTRÓNICO
					=============================================*/

                    date_default_timezone_set("America/Chicago");

                    $url = Route::routeClient();

                    $mail = new PHPMailer;

                    $mail->isMail();
                    $mail->setFrom("andy@andysinfiltros.com", "Andy Sin Filtros");
                    $mail->addReplyTo("andy@andysinfiltros.com", "Andy Sin Filtros");
                    $mail->Subject = "Por favor verifique su dirección de correo electronico";
                    $mail->addAddress($_POST["regEmail"]);
                    $mail->msgHTML('
                    
                    <div style="width: 100%; background: #eee; position: relative; font-family: sans-serif; padding-bottom: 40px;">
                    
                        <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
                        
                            <center>
                    
                                <h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>
                        
                                <hr style="border:1px solid #ccc; width:80%">
                        
                                <h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta, debe confirmar su dirección de correo electrónico</h4>
                        
                                <a href="'.$url.'/verificacion/'.$encriptarEmail.'" target="_blank" style="text-decoration:none">
                        
                                    <div style="line-height:60px; background:#0aa; width:60%; color:white">
                                        Verifique su dirección de correo electrónico
                                    </div>
                        
                                </a>
                        
                                <br>
                        
                                <hr style="border:1px solid #ccc; width:80%">
                        
                                <h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>
                        
                            </center>
                    
                        </div>
                
                    </div>');

                    $envio = $mail->Send();

                    if(!$envio){
                        
                        echo '<script>
                
                                swal({
                                        title: "ERROR",
                                        text: "Ha occurido un problema enviando verificacion de correo electronico a 
                                                '.$_POST["regEmail"].$mail->ErrorInfo.'",
                                        type: "error",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                                    },
                                    
                                    function(isConfirm){

                                        if(isConfirm){
                                            history.back();
                                        }
                                    });
                                </script>';
                    }
                    else{
                        echo '<script> 

							swal({
								  title: "OK",
								  text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta",
								  type:"success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';
                    }
                }

            }
            else{

                echo '<script>
                
                    swal({
                            title: "ERROR",
                            text: "Error al registrar el usuario, no se permiten caracteres especiales",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        
                        function(isConfirm){

                            if(isConfirm){
                                history.back();
                            }
                        });
                    </script>';
            }
        }

    }

    public static function showUser($item, $value){

        $table = "users";

        $response = UserModel::showUser($table, $item, $value);

        return $response;

    }

    public static function updateUser($id, $item, $value){

        $table = "users";

        $response = UserModel::updateUser($table, $id, $item, $value);

        return $response;
    }

    public static function ingressUser(){

        if(isset($_POST["g-recaptcha-response"])){

            $secret = "6LcJkSQjAAAAANE0hCyOYJUoOBQP52uYdJglMbxi";

            $recaptcha_response = $_POST["g-recaptcha-response"];

            $remoteip = $_SERVER["REMOTE_ADDR"];

            $result =  file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha_response&remoteip=$remoteip");

            $array = json_decode($result,true);

            if($array["success"]){

                if(isset($_POST["ingEmail"])){

            if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $table = "users";
                $item = "email";
                $value = $_POST["ingEmail"];

                $response = UserModel::showUser($table, $item, $value);

                if($response["email"] == $_POST["ingEmail"] && $response["password"] == $encriptar){

                    if($response["verification"] == 1){

                        echo '<script> 

							swal({
								  title: "NO HA VERIFICADO SU CORREO ELECTRÓNICO",
								  text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

                    }else{
                           
                        $_SESSION["validateSesion"] = "ok";
                        $_SESSION["id"] = $response["id"];
                        $_SESSION["name"] = $response["name"];
                        $_SESSION["photo"] = $response["photo"];
                        $_SESSION["email"] = $response["email"];
                        $_SESSION["password"] = $response["password"];
                        $_SESSION["mode"] = $response["mode"];

                        echo '<script>
                        
                            window.location = localStorage.getItem("routeCurrent");
                            
                            </script>';

                    }

                }else{

                    echo '<script>
                    
                    swal({
                            title: "ERROR AL INGRESAR",
                            text: "Por favor revise que el email exista o la contraseña coincida con la registrada",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        
                        function(isConfirm){

                            if(isConfirm){
                                window.location = localStorage.getItem("routeCurrent");
                            }
                        });
                    </script>';

                }

            }else{

                echo '<script>
                
                swal({
                        title: "ERROR",
                        text: "Error al ingresar al sistema, no se permiten caracteres especiales",
                        type: "error",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    },
                    
                    function(isConfirm){

                        if(isConfirm){
                            history.back();
                        }
                    });
                </script>';

            }
        }

                




                

            }else{

                echo '<script>
    
                    swal({
                            title: "Error al ingresar",
                            text: "Debe demostrar que no es un robot",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        
                        function(isConfirm){

                            if(isConfirm){
                                window.location = localStorage.getItem("routeCurrent");
                            }
                        });

                    </script>';

            }
            
        }


        
    }

    public static function olvidoPassword(){
        
        if(isset($_POST["passEmail"])){

            if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])){

                //RANDOM PASSWORD

                function generatePassword($longitud){

                    $key = "";
                    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

                    $key = substr(str_shuffle($pattern), 0, $longitud);

                    return $key;

                }

                $newPassword = generatePassword(11);

                $encriptar = crypt($newPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $table = "users";

                $item1 = "email";
                $value1 = $_POST["passEmail"];

                $response1 = UserModel::showUser($table, $item1, $value1);

                if($response1){

                    $id = $response1["id"];
                    $item2 = "password";
                    $value2 = $encriptar;

                    $response2 = UserModel::updateUser($table, $id, $item2, $value2);

                    if($response2 == "ok"){

                        date_default_timezone_set("America/Chicago");

                        $url = Route::routeClient();
    
                        $mail = new PHPMailer;
    
                        $mail->Charset = 'UTF-8';
    
                        $mail->isMail();
                        $mail->setFrom("andy@andysinfiltros.com", "AndySinFiltros");
                        $mail->addReplyTo("andy@andysinfiltros.com", "AndySinFiltros");
                        $mail->Subject = "Solicitud de nueva contraseña";
                        $mail->addAddress($_POST["passEmail"]);
                        $mail->msgHTML('
                        
                        <div style="width: 100%; background: #eee; position: relative; font-family: sans-serif; padding-bottom: 40px;">
    
                            <center>
                            
                                <img style="padding:20px; width:10%" src="">
                        
                            </center>
                        
                            <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
                            
                                <center>
                                
                                <img style="padding:20px; width:15%" src="">
                        
                                <h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>
                        
                                <hr style="border:1px solid #ccc; width:80%">
                        
                                <h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña: </strong>'.$newPassword.'</h4>
                        
                                <a href="'.$url.'" target="_blank" style="text-decoration:none">
                        
                                    <div style="line-height:60px; background:#0aa; width:60%; color:white">
                                        Ingrese nuevamente al sitio
                                    </div>
                        
                                </a>
                        
                                <br>
                        
                                <hr style="border:1px solid #ccc; width:80%">
                        
                                <h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>
                        
                                </center>
                        
                            </div>
    
                        </div>');
    
                        $envio = $mail->Send();
    
                        if(!$envio){
                            
                            echo '<script>
                    
                                    swal({
                                            title: "ERROR",
                                            text: "Ha occurido un problema enviando cambio de contraseña a 
                                                    '.$_POST["passEmail"].$mail->ErrorInfo.'",
                                            type: "error",
                                            confirmButtonText: "Cerrar",
                                            closeOnConfirm: false
                                        },
                                        
                                        function(isConfirm){
    
                                            if(isConfirm){
                                                history.back();
                                            }
                                        });
                                    </script>';
                        }
                        else{
                            echo '<script> 
    
                                swal({
                                      title: "OK",
                                      text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["passEmail"].' para su cambio de contraseña",
                                      type:"success",
                                      confirmButtonText: "Cerrar",
                                      closeOnConfirm: false
                                    },
    
                                    function(isConfirm){
    
                                        if(isConfirm){
                                            history.back();
                                        }
                                });
    
                            </script>';
                        }

                    }


                }else{

                    echo '<script>
                    
                    swal({
                            title: "ERROR",
                            text: "El correo electrónico no existe en el sistema",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        
                        function(isConfirm){

                            if(isConfirm){
                                history.back();
                            }
                        });
                    </script>';

                }


            }else{

                echo '<script>
                    
                    swal({
                            title: "ERROR",
                            text: "Error al enviar el correo electrónico, no se permiten caracteres especiales",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        
                        function(isConfirm){

                            if(isConfirm){
                                history.back();
                            }
                        });
                    </script>';

            }


        }



    }

    public static function registerSocialMedia($data){

        $table = "users";
        $item = "email";
        $value = $data["email"];
        $emailRepetido = false;

        $response0 = UserModel::showUser($table, $item, $value);

        if($response0){

            $emailRepetido = true;
            
        }else{

            $response1 = UserModel::registerUser($table, $data);
        }

        if($emailRepetido || $response1 == "ok"){

            $item = "email";
            $value = $data["email"];

            $response2 = UserModel::showUser($table, $item, $value);

            if($response2["mode"] == "facebook"){

                //INICIO SESION EN ESTA PARTE YA QUE ENVIO LOS DATOS DESDE JAVASCRIPT
                session_start();

                $_SESSION["validateSesion"] = "ok";
                $_SESSION["id"] = $response2["id"];
                $_SESSION["name"] = $response2["name"];
                $_SESSION["photo"] = $response2["photo"];
                $_SESSION["email"] = $response2["email"];
                $_SESSION["password"] = $response2["password"];
                $_SESSION["mode"] = $response2["mode"];

                echo "ok";

            }else if($response2["mode"] == "google"){

                $_SESSION["validateSesion"] = "ok";
                $_SESSION["id"] = $response2["id"];
                $_SESSION["name"] = $response2["name"];
                $_SESSION["photo"] = $response2["photo"];
                $_SESSION["email"] = $response2["email"];
                $_SESSION["password"] = $response2["password"];
                $_SESSION["mode"] = $response2["mode"];

                echo "ok";

            }
            else{

                echo "";
            }
        }
    }

    public static function updateProfile(){

        if(isset($_POST["editName"])){

            $ruta = $_POST["photoUser"];

            if(isset($_FILES["dataImage"]["tmp_name"]) && !empty($_FILES["dataImage"]["tmp_name"])){

                $directory = "views/img/users/".$_POST["idUser"];

                if(!empty($_POST["photoUser"])){

                    unlink($_POST["photoUser"]);
                }else{
                    
                    mkdir($directory, 0755);
                }

                //MODIFICO TAMAÑO FOTO

                list($ancho, $alto) = getimagesize($_FILES["dataImage"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				$aleatorio = mt_rand(100, 999);

				if($_FILES["dataImage"]["type"] == "image/jpeg"){

					$ruta = "views/img/users/".$_POST["idUser"]."/".$aleatorio.".jpg";

					/*=============================================
					MOFICAMOS TAMAÑO DE LA FOTO
					=============================================*/

					$origen = imagecreatefromjpeg($_FILES["dataImage"]["tmp_name"]);
                    
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($_FILES["dataImage"]["type"] == "image/png"){

					$ruta = "views/img/users/".$_POST["idUser"]."/".$aleatorio.".png";

					/*=============================================
					MOFICAMOS TAMAÑO DE LA FOTO
					=============================================*/

					$origen = imagecreatefrompng($_FILES["dataImage"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
    			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

            }

            if($_POST["editPassword"] == ""){

                $password = $_POST["passUser"];

            }else{

                $password = crypt($_POST["editPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            }
            
            $data = array("name" => $_POST["editName"],
                          "password" => $password,
                          "photo" => $ruta,
                          "id" => $_POST["idUser"]);

            $table = "users";

            $response = UserModel::updateProfile($table, $data);

            if($response == "ok"){

                $_SESSION["validateSesion"] = "ok";
                $_SESSION["id"] = $data["id"];
                $_SESSION["name"] = $data["name"];
                $_SESSION["photo"] = $data["photo"];
                $_SESSION["email"] = $_POST["emailUser"];
                $_SESSION["password"] = $data["password"];
                $_SESSION["mode"] = $_POST["modeUser"];

                echo '
                
                <script>
                    
                swal({
                        title: "OK",
                        text: "Su cuenta ha sido actualizada correctamente",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    },
                    
                    function(isConfirm){

                        if(isConfirm){
                            history.back();
                        }
                    });
                </script>';

            }
        }

    }

    public static function showPurchases($item, $value){

        $table = "purchases";

        $response = UserModel::showPurchases($table, $item, $value);

        return $response;

    }
    
    public static function showCommentsProfile($data){

		$table = "comments";

		$response =  UserModel::showCommentsProfile($table, $data);

		return $response;

	}

    public static function showCommentsPost($data){

		$table = "blog_comments";

		$response =  UserModel::showCommentsPost($table, $data);

		return $response;

	}

    public static function updateComment(){

		if(isset($_POST["idComment"])){

			if(preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["comment"])){
			
                $table = "comments";

                $data = array("id"=>$_POST["idComment"],
                              "calification"=>$_POST["score"],
                              "comment"=>$_POST["comment"]);

                $response = UserModel::updateComment($table, $data);

                if($response == "ok"){

                    echo'
                    
                    <script>

                        swal({
                                title: "GRACIAS POR COMPARTIR SU OPINIÓN",
                                text: "Su calificación y comentario ha sido guardado",
                                type: "success",
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                        },

                        function(isConfirm){
                                    if (isConfirm) {	   
                                    history.back();
                                    } 
                        });

                        </script>';

                }

			}else{

				echo'
                
                <script>

					swal({
						  title: "ERROR AL ENVIAR SU CALIFICACIÓN",
						  text: "El comentario no puede llevar caracteres especiales",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							   history.back();
							  } 
					});

				  </script>';

			}

		}

	}

    public static function deleteUser(){

        if(isset($_GET["id"])){

            $table = "users";
            $id = $_GET["id"];

            if($_GET["photo"] != ""){

                unlink($_GET["photo"]);
                rmdir('views/img/users/'.$_GET["id"]);
            }

            $response = UserModel::deleteUser($table, $id);

            if($response == "ok"){

                $client = Route::routeClient();

                echo'
                
                <script>

                    swal({
                            title: "SU CUENTA HA SIDO ELIMINADA",
                            text: "Debe registrarse nuevamente si desea ingresar",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                    },

                    function(isConfirm){
                                if (isConfirm) {	   
                                    window.location = "'.$client.'salir";
                                } 
                    });

                </script>';

            }

        }

    }

    public static function comentarPost(){

        if(isset($_POST['message']) && 
                isset($_POST['idUsuario']) && 
                    Isset($_POST['idPost'])){

            if(preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["message"])){

                $table = "blog_comments";

                $data = array("id_user"=>$_POST["idUsuario"],
                            "id_post"=>$_POST["idPost"],
                            "comment"=>$_POST["message"]);

                $response = UserModel::newCommentPost($table, $data);

                if($response == "ok"){

                    $client = Route::routeClient();

                    echo'
                    
                    <script>

                        swal({
                            title: "GRACIAS POR COMPARTIR SU OPINIÓN",
                            text: "Su comentario ha sido guardado",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },

                        function(isConfirm){
                            if (isConfirm) {	   
                                history.back();
                            } 
                        });

                    </script>';

                }
                
            }else{

				echo'
                
                <script>

					swal({
						  title: "ERROR AL ENVIAR SU COMENTARIO",
						  text: "El comentario no puede llevar caracteres especiales",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							   history.back();
							  } 
					});

				  </script>';

			}
                    
        }

    }

}