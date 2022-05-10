<?php

require_once "../controllers/commerce.controller.php";
require_once "../models/commerce.model.php";

class AjaxCommerce{

    public $imageLogo;

    public function ajaxChangeLogo(){

        $item = "logo";
        $value = $this->imageLogo;

        $response = ControllerCommerce::updateLogoIcon($item, $value);

        echo $response;

    }
}

if(isset($_FILES["imageLogo"])){

    $logotipo = new AjaxCommerce();
    $logotipo->imageLogo = $_FILES["imageLogo"];
    $logotipo->ajaxChangeLogo();
}