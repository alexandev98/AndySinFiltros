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
                             "verification"=>1,
                             "emailCrypt"=>$encriptarEmail);

                $table = "users";

                $response = UserModel::registerUser($table, $data);

                if($response == "ok"){

                    date_default_timezone_set("America/Chicago");

                    $url = Route::routeClient();

                    $mail = new PHPMailer;

                    $mail->isMail();
                    $mail->setFrom("andy@andysinfiltros.com", "AndySinFiltros");
                    $mail->addReplyTo("andy@andysinfiltros.com", "AndySinFiltros");
                    $mail->Subject = "Por favor verifique su dirección de correo electronico";
                    $mail->addAddress($_POST["regEmail"]);
                    $mail->msgHTML('
                    
                    <div style="width: 100%; background: #eee; position: relative; font-family: sans-serif; padding-bottom: 40px;">
    
                        <center>
                        
                            <img style="padding:20px; width:10%" src="">
                    
                        </center>
                    
                        <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
                        
                            <center>
                            
                            <img style="padding:20px; width:15%" src="">
                    
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
                                        title: "¡ERROR!",
                                        text: "¡Ha occurido un problema enviando verificacion de correo electronico a 
                                                '.$_POST["regEmail"].$mail->ErrorInfo.'!",
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
								  title: "¡OK!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta!",
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
                            title: "¡ERROR!",
                            text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
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
}