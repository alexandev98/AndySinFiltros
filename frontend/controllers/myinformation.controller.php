<?php

class MyInformationController{

    static public function showInformation(){
        $table="administrators";

        $response=MyInformationModel::showInformation($table);

        return $response;
    }

}