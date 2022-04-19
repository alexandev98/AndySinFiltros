<?php

require_once "../extensions/paypal.controller.php";
require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

class AjaxCarrito{

    /*=============================================
	MÉTODO PAYPAL
	=============================================*/	

	public $divisa;
	public $total;
	public $totalCrypt;
	public $tax;
	public $subtotal;
	public $title;
	public $quantity;
	public $valueItem;
	public $idProduct;

	public function ajaxEnviarPaypal(){

		if(md5($this->total) == $this->totalCrypt){

			$data = array(
                "divisa"=>$this->divisa,
                "total"=>$this->total,
				"tax"=>$this->tax,
                "subtotal"=>$this->subtotal,
                "title"=>$this->title,
                "quantity"=>$this->quantity,
				"valueItem"=>$this->valueItem,
                "idProduct"=>$this->idProduct,
            );

			$response = Paypal::pagoPaypal($data);

			echo $response;

		}

	}


}


/*=============================================
MÉTODO PAYPAL
=============================================*/	

if(isset($_POST["divisa"])){

	$idProduct =  $_POST["idProduct"];
	$quantity = $_POST["quantity"];
	$priceProduct = $_POST["valueItem"];

	$item = "id";
	$value = $idProduct;
	$checkProduct = ProductController::showInfoProduct($item, $value);

	if($checkProduct["offerPrice"] == 0){

		$price = number_format($checkProduct["price"], 2);

	}else{

		$price = number_format($checkProduct["offerPrice"], 2);

	}

	$checkSubTotal = $quantity * $price;

	if($checkSubTotal != $priceProduct){

		echo 'asesorias';

		return;
	}

		$paypal = new AjaxCarrito();
		$paypal -> divisa = $_POST["divisa"];
		$paypal -> total = $_POST["total"];
		$paypal -> totalCrypt = $_POST["totalCrypt"];
		$paypal -> tax = $_POST["tax"];
		$paypal -> subtotal = $_POST["subtotal"];
		$paypal -> title = $_POST["title"];
		$paypal -> quantity = $_POST["quantity"];
		$paypal -> valueItem = $_POST["valueItem"];
		$paypal -> idProduct = $_POST["idProduct"];
		$paypal -> ajaxEnviarPaypal();


	
}

