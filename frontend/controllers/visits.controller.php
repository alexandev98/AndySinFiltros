<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ControllerVisits{

    public static function sendIp($ip, $country){

        $table = "visitspeople";
        $visit = 1;

        if($country == ""){
            $country = "Unknown";
        }

        $searchIp = ModelVisit::selectIp($table, $ip);

        if(!$searchIp){

            //GUARDAR IP NUEVA

            $response = ModelVisit::saveNewIp($table, $ip, $country, $visit);


        }else{

            //SI LA IP EXISTE Y ES OTRO DIA VOLVERLA A GUARDAR

            date_default_timezone_set('America/Chicago');

            $fechaActual = date('Y-m-d');

            foreach ($searchIp as $key => $value) {
                
                $compareDate = substr($value["date"], 0, 10);

                if($fechaActual != $compareDate){

                    $responseSaveIp = ModelVisit::saveNewIp($table, $ip, $country, $visit);

                }
            }
        }

        
        
    }

}



