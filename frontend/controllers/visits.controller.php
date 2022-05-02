<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ControllerVisits{

    public static function sendIp($ip, $country){

        $table = "visitspeople";
        $visit = 1;

        $responseSaveIp = null;
        $responseUpdateIp = null;

        if($country == ""){
            $country = "Unknown";
        }

        $searchIp = ModelVisit::selectIp($table, $ip);

        if(!$searchIp){

            //GUARDAR IP NUEVA

            $responseSaveIp = ModelVisit::saveIp($table, $ip, $country, $visit);
            

        }else{

            //SI LA IP EXISTE Y ES OTRO DIA VOLVERLA A GUARDAR

            date_default_timezone_set('America/Chicago');

            $fechaActual = date('Y-m-d');

            

            foreach ($searchIp as $key => $value) {
                
                $compareDate = substr($value["date"], 0, 10);
               
                
                if($fechaActual != $compareDate){

                    $responseUpdateIp = ModelVisit::saveIp($table, $ip, $country, $visit);

                }
            }
        }

        if($responseSaveIp == "ok" || $responseUpdateIp == "ok"){

            $tableCountry = "visitscountry";

            $selectCountry = ModelVisit::selectCountry($tableCountry, $country);

            if(!$selectCountry){

                //SINO EXISTE EL PAIS AGREGAR NUEVO PAIS

                $quantity = 1;

                $saveCountry = ModelVisit::saveCountry($tableCountry, $country, $quantity);

            }else{

                //SI EXISTE EL PAIS ACTUALIZAR NUEVA VISITA

                $updateQuantity = $selectCountry["quantity"] + 1;

                $updateCountry = ModelVisit::updateCountry($tableCountry, $country, $updateQuantity);
            }

        }
        
    }

}



