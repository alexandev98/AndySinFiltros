<?php

require_once "../extensions/paypal.controller.php";

class AjaxCarrito{

    /*=============================================
	MÉTODO PAYPAL
	=============================================*/	

	public $divisa;
	public $total;
	public $tax;
	public $subtotal;
	public $title;
	public $quantity;
	public $valueItem;
	public $idProduct;

	public function ajaxEnviarPaypal(){
	
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


/*=============================================
MÉTODO PAYPAL
=============================================*/	

if(isset($_POST["divisa"])){

	$paypal = new AjaxCarrito();
	$paypal -> divisa = $_POST["divisa"];
	$paypal -> total = $_POST["total"];
	$paypal -> tax = $_POST["tax"];
	$paypal -> subtotal = $_POST["subtotal"];
	$paypal -> title = $_POST["title"];
	$paypal -> quantity = $_POST["quantity"];
	$paypal -> valueItem = $_POST["valueItem"];
	$paypal -> idProduct = $_POST["idProduct"];

	$paypal -> ajaxEnviarPaypal();

}

