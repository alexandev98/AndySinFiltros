<?php

require __DIR__  . '/vendor/autoload.php';


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

$table = "commerce";

$response = CartModel::showRates($table);

$clientPaypal = $response["clientPaypal"];
$keySecretPaypal = $response["keySecretPaypal"];
$modePaypal = $response["modePaypal"];

$apiContext = new ApiContext(
    
    new OAuthTokenCredential(
        
        $clientPaypal,
        $keySecretPaypal
    
    )
);

 $apiContext->setConfig(
    array(
        'mode' => $modePaypal,
        'log.LogEnabled' => true,
        'log.FileName' => '../PayPal.log',
        'log.LogLevel' => 'DEBUG', 
        'http.CURLOPT_CONNECTTIMEOUT' => 30

    )
);
