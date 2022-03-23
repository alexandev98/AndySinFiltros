<?php

class ControllerUsers{

    //REGISTER USER

    public function ctrRegisterUser(){

        if(isset($_POST["regUser"])){

            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUser"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){

               

               


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