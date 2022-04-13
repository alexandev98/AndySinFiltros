<?php

$client = Route::routeClient();

if(!isset($_SESSION["validateSesion"])){

    echo '<script>window.location = "'.$client.'";</script>';

    exit();
}

require 'extensions/bootstrap.php';
require_once "models/cart.model.php";

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

if(isset($_GET['paypal']) && $_GET['paypal'] === 'true'){

    $idProduct = $_GET['product'];

    #capturo el ID del pago que envia paypal
    $paymentId = $_GET['paymentId'];

    #creo un objeto de payment para confirmar que las credenciales tengan el ID de pago
    $payment = Payment::get($paymentId, $apiContext);

    #creo la ejecucion de pago, invocando la clase payment execution y extrigo el ID del pagador
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    #valido con las credenciales que el id del pagador coincida
    $payment->execute($execution, $apiContext);
    $dataTransaction = $payment->toJSON();

    $dataUser = json_decode($dataTransaction);

    $emailPayer = $dataUser->payer->payer_info->email;
    $city = $dataUser->payer->payer_info->shipping_address->city;
    $state = $dataUser->payer->payer_info->shipping_address->state;
    $country = $dataUser->payer->payer_info->shipping_address->country_code;

   

    $address = $city.", ".$state;

    $data = array("idUser"=>$_SESSION["id"],
                  "idProduct"=>$idProduct,
                  "method"=>"paypal",
                  "email"=>$emailPayer,
                  "address"=>$address,
                  "country"=>$country);


    $response = CarController::newPurchases($data);


}