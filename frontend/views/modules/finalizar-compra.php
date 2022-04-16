<?php

$client = Route::routeClient();

if(!isset($_SESSION["validateSesion"])){

    echo '<script>window.location = "'.$client.'";</script>';

    exit();
}

require 'extensions/bootstrap.php';
require_once "models/cart.model.php";
require_once "extensions/zoom.controller.php";

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $namePayer = $dataUser->payer->payer_info->first_name;
    $lastNamePayer = $dataUser->payer->payer_info->last_name;
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

    $response = CartController::newPurchases($data);

    $order = "id";
    $item = "id";
    $value = $idProduct;

    $productPurchase = ProductController::showInfoProduct($item, $value);
        
    $item1 = "sales";
    $value1 = $productPurchase["sales"] + 1;
    $item2 = "id";
    $value2 = $productPurchase["id"];

    $updateProduct = ProductController::updateProduct($item1, $value1, $item2, $value2);

    if($response == "ok" && $updateProduct == "ok"){

        //CREACION DE REUNION POR ZOOM
        $zoom_meeting = new Zoom();

        $data = array();
        $data['topic'] 		= $productPurchase["title"];
        $data['start_date'] = date("Y-m-d h:i:s", strtotime('tomorrow'));
        $data['duration'] 	= 120;
        $data['type'] 		= 2;
        $data['password'] 	= "12345";

        try {
            $response = $zoom_meeting->createMeeting($data);
            
            $meeting_id = $response->id;
            $topic = $response->topic;
            $meeting_url = $response->join_url;
            $meet_password = $response->password;
            
        } catch (Exception $ex) {
            echo $ex;
        }

        //AGREGO EVENTO EN CALENDARIO
        $calendarId = "c3v66nrkvmj0fg75b15p30sqlo@group.calendar.google.com";
        $googleClient = new Google_Client();
        $googleClient->setAuthConfigFile('models/calendar.json');
        $googleClient->addScope(Google_Service_Calendar::CALENDAR);
        $service = new Google_Service_Calendar($googleClient);
    
        $event = new Google_Service_Calendar_Event(array(
        'summary' => $productPurchase["title"],
        'location' => 'Earth',
        'description' => 'Enlace de la sesión: \n'.$url,
        'start' => array(
            'dateTime' => "2022-04-15T06:00:00+02:00",
            'timeZone' => "Europe/Zurich",
        ),
        'end' => array(
            'dateTime' => "2022-04-15T07:00:00+02:00",
            'timeZone' => "Europe/Zurich",
        ),
        ));

        $createdEvent = $service->events->insert($calendarId, $event);

        date_default_timezone_set("America/Chicago");

        $url = Route::routeClient();
        $server = Route::routeServer();
        $social = ControllerTemplate::styleTemplate();

        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';

        $mail->isMail();
        $mail->setFrom("andy@andysinfiltros.com", "AndySinFiltros");
        $mail->addReplyTo("andy@andysinfiltros.com", "AndySinFiltros");
        $mail->Subject = "Confirmación del pedido de ".$productPurchase["title"];
        $mail->addAddress($_SESSION["email"]);
        $mail->msgHTML('

        <table width="660" border="0" cellpadding="0" cellspacing="0" align="center" >

            <tr>

                <td width="100%" style="min-width: 100%;">

                    <a href="'.$url.'">

                        <center>
                                    
                            <img style="margin-left:-100px; width:135%" src="'.$server.$social["logo"].'">
                                            
                        </center>
                    </a>
                
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>

                            <td width="4%"></td>
                
                            <td width="92%" >

                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                
                                    <tr>

                                        <td>

                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        
                                                <tr>

                                                    <td align="center" style="font-size:50px;line-height:60px; font-weight: bold; color:#000000;font-family:serif;">

                                                        <span><strong>Confirmación del pedido</strong></span>

                                                    </td>
                                                
                                                </tr>

                                            </table>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <table class="sectiondivider" width="100%" border="0" cellspacing="0" cellpadding="0"style="border-bottom: 2px solid #000000;">
                                            
                                                <tr>
                                                    <td height="30"></td>
                                                <td>
                                            
                                            </table>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        
                                                <tr>

                                                    <td height="30"></td>
                                        
                                                <tr>
                                    
                                                
                                                <tr>

                                                    <td width="48%" valign="top" style="vertical-align:top;">

                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        
                                                            <tr>
                                                                <td style="text-align:left; padding:0px 0px 36px 0px;font-size: 24px; color: #000000;line-height:28px !important; word-wrap: break-word;" valign="top"><span><strong>ASESORÍA PERSONALIZADA AC Y BLW / BLISS</strong></span></td>
                                                            </tr>
                                                        
                                                            <tr>

                                                                <td align="left">

                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                                        <tr>

                                                                            <td>

                                                                                <a href="'.$meeting_url.'" target="_blank" style="padding: 13px 27px 13px 27px; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 2px; -webkit-border-radius: 2px; -moz-border-radius: 2px; background-color: #000000; display: inline-block;text-align:center;">Comienza el Curso</a>
                                                                            
                                                                            </td>

                                                                        </tr>

                                                                    </table>

                                                                </td>

                                                            </tr>

                                                        </table>

                                                    </td>

                                                    <td width="4%"></td>

                                                    <td width="48%" valign="top" style="vertical-align:top;">

                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" valign="top">

                                                            <tr>

                                                                <td width="100%" align="right" valign="top" style="vertical-align:top;">
                                                                
                                                                    <img width="100%" valign="top" style="display:block; width:100%; max-width:240px;" src="'.$server.$productPurchase["front"].'">

                                                                </td>

                                                            </tr>

                                                        </table>

                                                    </td>

                                                </tr>

                                            </table>

                                        </td>

                                    </tr>
                                    
                                    <tr>

                                        <td>

                                            <table class="sectiondivider" width="100%" border="0" cellspacing="0" cellpadding="0"style="border-bottom: 2px solid #000000;">
                                    
                                                <tr>

                                                    <td height="30"></td>
                                            
                                                </tr>

                                            </table>

                                        </td>

                                    </tr>

                                    <tr>
                                        <td>

                                            <table class="sectiondivider" width="100%" border="0" cellspacing="0" cellpadding="0">
                                            
                                                <tr>

                                                    <td>

                                                        <table width="100%" cellpadding="0" cellspacing="0" align="center">

                                                    
                                                        <td height="30"></td>

                                                    </td>

                                                </tr>

                                            </table>

                                        </td>
                                        
                                    </tr>  

                                    <tr>

                                        <td>

                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            
                                                <tr>
                                                
                                                    <td width="48%" valign="top" align="left">

                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                    <tr>

                                                        <td style="font-size: 20px; line-height:24px;"><strong>Comprador</strong></td>

                                                </tr>
                                            
                                                <tr>

                                                    <td>

                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                            <tr>

                                                                <td style="padding: 5px 0px 0px 0px;"></td>

                                                            </tr>

                                                            <tr>

                                                                <td style="padding: 0px 0px 0px 0px; border-bottom: 1px solid #D9DADD;"></td>

                                                            </tr>

                                                            <tr>

                                                                <td style="padding: 5px 0px 0px 0px;"></td>

                                                            </tr>

                                                        </table>

                                                    </td>

                                                </tr>
                                    
                                                <tr>

                                                    <td style="font-size: 16px; line-height:20px;"><strong>Nombre: </strong>'.$namePayer.' '.$lastNamePayer.'</td>

                                                </tr>

                                                <tr>

                                                    <td style="font-size: 16px; line-height:20px;word-break: break-all;"><strong>Email: </strong>'.$emailPayer.'</td>

                                                </tr>

                                            </table>

                                        </td>

                                    </tr>

                                    <tr>
                                        
                                        <td>

                                            <table width="100%" cellpadding="0" cellspacing="0" align="center">

                                                <tr>

                                                    <td height="10"></td>
                                                    
                                                </tr>

                                            </table>
                                            
                                        </td>

                                    </tr>  
                                        
                                    <tr>
                                            
                                        <td width="48%" valign="top" align="left">

                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                <tr>

                                                    <td style="font-size: 20px; line-height:24px;"><strong>Detalles de recibo</strong></td>

                                                </tr>
                                                
                                                <tr>

                                                    <td>

                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                            <tr>

                                                                <td style="padding: 5px 0px 0px 0px;">

                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td style="padding: 0px 0px 0px 0px; border-bottom: 1px solid #D9DADD;">

                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td style="padding: 5px 0px 0px 0px;">

                                                                </td>

                                                            </tr>

                                                        </table>

                                                    </td>

                                                </tr>
                                                
                                                <tr>
                                                    
                                                    <td style="font-size: 16px; line-height:20px;"><strong>Curso: </strong>'.$productPurchase["title"].'</td>

                                                </tr>

                                                <tr>

                                                <td style="font-size: 16px; line-height:20px;word-break: break-all;"><strong>Precio: </strong>USD $'.$productPurchase["price"].'</td>

                                                </tr>

                                                <tr>

                                                    <td style="font-size: 16px; line-height:20px;"><strong>Descuento: </strong>USD $0</td>

                                                </tr>

                                                <tr>

                                                    <td style="font-size: 16px; line-height:20px;"><strong>Impuesto: </strong>USD $0</td>

                                                </tr>

                                                <tr>

                                                    <td style="font-size: 16px; line-height:20px;"><strong>Total: </strong>USD $'.$productPurchase["price"].'</td>

                                                </tr>

                                            </table>

                                        </td>

                                    </tr>  
                                            
                                    <tr>

                                        <td>

                                            <table width="100%" cellpadding="0" cellspacing="0" align="center">

                                                <tr>

                                                    <td height="30"></td>

                                                </tr>

                                            </table>

                                        </td>
                                        
                                    </tr>            
                                        
                                
                                </table>

                            </td>
                                    <td width="1%"></td>
                                    </tr>

                                    <!-- close content -->
                                </table>

                            </td>
                
                            <td width="4%"></td>   

                        </tr>  

                    </table>

                </td>

            </tr>

        </table>');

        $envio = $mail->Send();

        if($envio){
            
            echo '
            <script>
            
                window.location = "'.$client.'perfil";

            </script>';

        }

    }


}