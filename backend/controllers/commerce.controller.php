<?php

class ControllerCommerce{

    public static function selectTemplate(){

        $table = "template";

        $response = ModelCommerce::selectTemplate($table);

        return $response;
    }

    public static function updateLogoIcon($item, $value){

        $table = "template";

        $response = ModelCommerce::updateLogoIcon($table);

        return $response;
    }

}