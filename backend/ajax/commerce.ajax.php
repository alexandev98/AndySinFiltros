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

	/*=============================================
	CAMBIAR COLORES
	=============================================*/

	public $topBar;
	public $topText;
	public $colorBackground;
	public $colorText;

	public function ajaxChangeColor(){
		
		$data = array("topBar"=>$this->topBar,
					  "topText"=>$this->topText,
					  "colorBackground"=>$this->colorBackground,
					  "colorText"=>$this->colorText);

		$response = ControllerCommerce::updateColors($data);

		echo $response;
	}

	/*=============================================
	CAMBIAR REDES SOCIALES
	=============================================*/

	public $socialMedia;

	public function ajaxChangeSocialMedia(){
		
		$item = "socialMedia";
		$valor = $this->socialMedia;
		
		$response = ControllerCommerce::updateLogoIcon($item, $valor);

		echo $response;

	}

	/*=============================================
	CAMBIAR SCRIPT
	=============================================*/

	public $apiFacebook;
	public $pixelFacebook;
	public $googleAnalytics;

	public function ajaxChangeScript(){

		$data = array("apiFacebook"=>$this->apiFacebook,
					   "pixelFacebook"=>$this->pixelFacebook,
					   "googleAnalytics"=>$this->googleAnalytics);


		$response = ControllerCommerce::updateScript($data);

		

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

/*=============================================
CAMBIAR COLORES
=============================================*/	
if(isset($_POST["topBar"])){

	$colors = new AjaxCommerce();
	$colors -> topBar = $_POST["topBar"];
	$colors -> topText = $_POST["topText"];
	$colors -> colorBackground = $_POST["colorBackground"];
	$colors -> colorText = $_POST["colorText"];
	$colors -> ajaxChangeColor();

}

/*=============================================
CAMBIAR REDES SOCIALES
=============================================*/	

if(isset($_POST["socialMedia"])){

	$socialMedia = new AjaxCommerce();
	$socialMedia -> socialMedia = $_POST["socialMedia"];
	$socialMedia -> ajaxChangeSocialMedia();

}

/*=============================================
CAMBIAR SCRIPT
=============================================*/	

if(isset($_POST["apiFacebook"])){

	$script = new AjaxCommerce();
	$script -> apiFacebook = $_POST["apiFacebook"];
	$script -> pixelFacebook = $_POST["pixelFacebook"];
	$script -> googleAnalytics = $_POST["googleAnalytics"];
	$script -> ajaxChangeScript();

}

/*=============================================
CAMBIAR INFORMACION
=============================================*/	

if(isset($_POST["impuesto"])){

	$info = new AjaxComercio();
	$info -> impuesto = $_POST["impuesto"];
	$info -> modoPaypal = $_POST["modoPaypal"];
	$info -> clienteIdPaypal = $_POST["clienteIdPaypal"];
	$info -> llaveSecretaPaypal = $_POST["llaveSecretaPaypal"];
	$info -> ajaxCambiarInformacion();

}
