<?php

require_once "../controllers/commerce.controller.php";
require_once "../models/commerce.model.php";

class AjaxCommerce{

    /*=============================================
	CAMBIAR LOGOTIPO
	=============================================*/

    public $imageLogo;

    public function ajaxChangeLogo(){

        $item = "logo";
        $value = $this->imageLogo;

        $response = ControllerCommerce::updateLogoIcon($item, $value);

        echo $response;

    }

    /*=============================================
	CAMBIAR ICONO
	=============================================*/

	public $imageIcon;	

	public function ajaxChangeIcon(){

		$item = "icon";
		$value = $this->imageIcon;

		$response = ControllerCommerce::updateLogoIcon($item, $value);

		echo $response;

	}
}

/*=============================================
CAMBIAR LOGOTIPO
=============================================*/	
if(isset($_FILES["imageLogo"])){

    $logotipo = new AjaxCommerce();
    $logotipo->imageLogo = $_FILES["imageLogo"];
    $logotipo->ajaxChangeLogo();
}

/*=============================================
CAMBIAR ICONO
=============================================*/	
if(isset($_FILES["imageIcon"])){

	$icon = new AjaxCommerce();
	$icon -> imageIcon = $_FILES["imageIcon"];
	$icon -> ajaxChangeIcon();

}