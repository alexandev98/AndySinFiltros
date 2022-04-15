<?php

require __DIR__  . '/vendor/autoload.php';

class GoogleCalendar{

	static public function pagoPaypal($data){

		require __DIR__ . '/bootstrap.php';

		$idProduct = $data["idProduct"];

		#Seleccionamos el método de pago
		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item1 = new Item();
		$item1->setName($data["title"])
			  ->setCurrency($data["divisa"])
			  ->setQuantity($data["cantidad"])
			  ->setPrice($data["total"]);

		$itemList = new ItemList();
		$itemList->setItems(array($item1));

		#Agregamos los detalles del pago: impuestos, envíos...etc
		$details = new Details();
		$details->setSubtotal($data["subtotal"]);

    	#definimos el pago total con sus detalles
    	$amount = new Amount();
		$amount ->setCurrency($data["divisa"])
		    	->setTotal($data["total"])
		    	->setDetails($details);	

		#Agregamos las características de la transacción
    	$transaction = new Transaction();
		$transaction->setAmount($amount)
    				->setItemList($itemList)
    				->setDescription("Payment description")
    				->setInvoiceNumber(uniqid());

    	#Agregamos las URL'S después de realizar el pago, o cuando el pago es cancelado
		#Importante agregar la URL principal en la API developers de Paypal
    	$url = Route::routeClient();

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl("$url/index.php?route=finalizar-compra&paypal=true&product=".$idProduct."&cantidad=".$data["cantidad"])
   				     ->setCancelUrl("$url/asesoria-blw-1");

   		#Agregamos todas las características del pago
   		$payment = new Payment();
		$payment->setIntent("sale")
			    ->setPayer($payer)
			    ->setRedirectUrls($redirectUrls)
			    ->setTransactions(array($transaction));

		

		#Tratar de ejcutar un proceso y si falla ejecutar una rutina de error
		try {
		    // traemos las credenciales $apiContext
		    $payment->create($apiContext);   
			
		   
		}catch(PayPal\Exception\PayPalConnectionException $ex){

			echo $ex->getCode(); // Prints the Error Code
			echo $ex->getData(); // Prints the detailed error message 
			die($ex);
			return "$url/error";

		}

		# utilizamos un foreach para iterar sobre $payment, utilizamos el método llamado getLinks() para obtener todos los enlaces que aparecen en el array $payment y caso de que $Link->getRel() coincida con 'approval_url' extraemos dicho enlace, finalmente enviamos al usuario a esa dirección que guardamos en la variable $redirectUrl on el método getHref();

		foreach ($payment->getLinks() as $link) {
			
			if($link->getRel() == "approval_url"){

				$redirectUrl = $link->getHref();
			}
		}

		return $redirectUrl;
	}

}