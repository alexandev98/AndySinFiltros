<?php

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

class AjaxProduct{
    
    public $idProduct;

    public function ajaxShowProduct(){

		$value = $this->idProduct;

        $item = "id";
		$response = ProductController::showInfoProduct($item, $value);
        $hours = $response["hour"];

		echo json_encode($hours);

	}

}


if(isset($_POST["idProduct"])){

    $idProduct = new AjaxProduct();
    $idProduct -> idProduct = $_POST["idProduct"];
    $idProduct -> ajaxShowProduct();

}
