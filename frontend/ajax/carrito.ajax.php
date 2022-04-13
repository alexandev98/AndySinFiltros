<?php

class AjaxCarrito{

    /*=============================================
	MÉTODO PAYPAL
	=============================================*/	

	public $divisa;
	public $total;
	public $subtotal;
	public $titulo;
	public $cantidad;
	public $valorItem;
	public $idProducto;

	public function ajaxEnviarPaypal(){
	
        $data = array(
                "divisa"=>$this->divisa,
                "total"=>$this->total,
                "subtotal"=>$this->subtotal,
                "titulo"=>$this->titulo,
                "cantidad"=>$this->cantidad,
                "valorItem"=>$this->valorItem,
                "idProducto"=>$this->idProducto,
            );

        $response = Paypal::pagoPaypal($data);

        echo $response;

	}


}


/*=============================================
MÉTODO PAYPAL
=============================================*/	

if(isset($_POST["divisa"])){

	$idProductos = explode("," , $_POST["idProductoArray"]);
	$cantidadProductos = explode("," , $_POST["cantidadArray"]);
	$precioProductos = explode("," , $_POST["valorItemArray"]);

	$item = "id";

	for($i = 0; $i < count($idProductos); $i ++){

		$valor = $idProductos[$i];

		$verificarProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

		$divisa = file_get_contents("http://free.currconv.com/api/v7/convert?q=USD_".$_POST["divisa"]."&compact=ultra&apiKey=a01ebaf9a1c69eb4ff79");

		$jsonDivisa = json_decode($divisa, true);

		$conversion = number_format($jsonDivisa["USD_".$_POST["divisa"]],2);

		if($verificarProductos["precioOferta"] == 0){

			$precio = $verificarProductos["precio"]*$conversion;
		
		}else{

			$precio = $verificarProductos["precioOferta"]*$conversion;

		}

		$verificarSubTotal = $cantidadProductos[$i]*$precio;

		// echo number_format($verificarSubTotal,2)."<br>";
		// echo number_format($precioProductos[$i],2)."<br>";

		// return;

		if(number_format($verificarSubTotal,2) != number_format($precioProductos[$i],2)){

			echo "carrito-de-compras";

			return;

		}

	}

	$paypal = new AjaxCarrito();
	$paypal ->divisa = $_POST["divisa"];
	$paypal ->total = $_POST["total"];
	$paypal ->totalEncriptado = $_POST["totalEncriptado"];
	$paypal ->impuesto = $_POST["impuesto"];
	$paypal ->envio = $_POST["envio"];
	$paypal ->subtotal = $_POST["subtotal"];
	$paypal ->tituloArray = $_POST["tituloArray"];
	$paypal ->cantidadArray = $_POST["cantidadArray"];
	$paypal ->valorItemArray = $_POST["valorItemArray"];
	$paypal ->idProductoArray = $_POST["idProductoArray"];
	$paypal -> ajaxEnviarPaypal();


}