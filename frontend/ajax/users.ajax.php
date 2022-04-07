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

    //FACEBOOK REGISTER

    public $email;
    public $name;
    public $photo;

    public function ajaxRegisterFacebook(){

        $data = array("name"=>$this->name,
                       "email"=>$this->email,
                       "photo"=>$this->photo,
                       "password"=>"null",
                       "mode"=>"facebook",
                       "verification"=>0,
                       "emailCrypt"=>"null");

        $response =  ControllerUsers::registerSocialMedia($data);

        echo $response;
    }


}

if(isset($_POST["validateEmail"])){
    
    $valEmail = new AjaxUsers();
    $valEmail->validateEmail = $_POST["validateEmail"];
    $valEmail->ajaxValidarEmail();
    
}

if(isset($_POST["email"])){
    
    $regFacebook = new AjaxUsers();
    $regFacebook->email = $_POST["email"];
    $regFacebook->name = $_POST["name"];
    $regFacebook->photo = $_POST["photo"];
    $regFacebook->ajaxRegisterFacebook();
    
}


