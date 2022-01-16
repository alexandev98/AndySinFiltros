<?php

class MyInformationController{

    static public function showInformation(){
        $table="myinformation";

        $response=MyInformationModel::showInformation($table);

        return $response;
    }

}