<?php

class ControllerUsers{

    //REGISTER USER

    public function ctrRegisterUser(){

        if(isset($_POST["regUser"])){

            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUser"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){

               $encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

               $data = array("name"=>$_POST["regUser"],
                             "email"=>$_POST["regEmail"],
                             "password"=>$encriptar,
                             "mode"=>"directo",
                             "verification"=>1);

                $table = "users";

                $response = UserModel::mdlRegisterUser($table, $data);

                if($response == "ok"){

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
}