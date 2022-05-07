<?php

class ControllerAdmin{

    public static function loginAdmin(){

        if(isset($_POST["ingEmail"])){

            if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                $table = "administrators";
                $item = "email";
                $value = $_POST["ingEmail"];

                $response = ModelAdministrators::showAdministrators($table, $item, $value);

                if(is_array($response) && $response["email"] == $_POST["ingEmail"] && $response["password"] == $_POST["ingPassword"]){

                    $_SESSION["validateSesion"] = "ok";
                    $_SESSION["id"] = $response["id"];
                    $_SESSION["name"] = $response["name"];
                    $_SESSION["photo"] = $response["photo"];
                    $_SESSION["email"] = $response["email"];
                    $_SESSION["password"] = $response["password"];
                    $_SESSION["profile"] = $response["profile"];

                    echo '
                    
                    <script>
                    
                        window.location = "index.php?route=inicio";

                    </script>';

                }else{
                    echo '<br> <div class="alert alert-danger">Error al ingresar, vuelva a intentarlo</div>';
                } 

                

                

            
            
            }
        }
    }


}