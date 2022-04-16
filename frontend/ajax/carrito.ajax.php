<?php

require_once "../extensions/paypal.controller.php";

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
				"total"=>$this->totalCrypt,
				"tax"=>$this->tax,
                "subtotal"=>$this->subtotal,
                "title"=>$this->title,
                "quantity"=>$this->quantity,
				"valueItem"=>$this->valueItem,
                "idProduct"=>$this->idProduct,
            );

			$response = Paypal::pagoPaypal($data);

			echo $response;

		}else{
			
		}
	
      

	}


}


/*=============================================
MÉTODO PAYPAL
=============================================*/	

if(isset($_POST["divisa"])){

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

