<?php

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class AjaxUsers{

    //VALIDATE EMAIL
    public $validateEmail;

    public function ajaxValidarEmail(){

        $data = $this->validateEmail;

        $response = ControllerUsers::showUser("email", $data);

        echo json_encode($response);

    }

    

}

if(isset($_POST["validateEmail"])){
    
    $valEmail = new AjaxUsers();
    $valEmail->validateEmail = $_POST["validateEmail"];
    $valEmail->ajaxValidarEmail();
    
}
