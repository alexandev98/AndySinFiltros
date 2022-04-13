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

    $paymentId = $_GET['paymentId'];

    $payment = Payment::get($paymentId, $apiContext);

    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    $payment->execute($execution, $apiContext);

    $data = array("idUser"=>$_SESSION["id"],
                  "idProduct"=>$idProduct);


    $response = CarController::newPurchases($data);


}