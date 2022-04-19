<?php

class BookingController{

    static public function showInformation(){
        
        $table="myinformation";

        $response=MyInformationModel::showInformation($table);

        return $response;
    }

}