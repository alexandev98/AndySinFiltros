<?php

require_once "../extensions/paypal.controller.php";

class AjaxCarrito{

    /*=============================================
	MÉTODO PAYPAL
	=============================================*/	

	public $divisa;
	public $total;
	public $subtotal;
	public $titulo;
	public $cantidad;
	public $idProducto;

	public function ajaxEnviarPaypal(){
	
        $data = array(
                "divisa"=>$this->divisa,
                "total"=>$this->total,
                "subtotal"=>$this->subtotal,
                "title"=>$this->titulo,
                "cantidad"=>$this->cantidad,
                "idProduct"=>$this->idProducto,
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
	$paypal -> subtotal = $_POST["subtotal"];
	$paypal -> titulo = $_POST["title"];
	$paypal -> cantidad = $_POST["cantidad"];
	$paypal -> idProducto = $_POST["idProduct"];
	$paypal -> ajaxEnviarPaypal();

}

