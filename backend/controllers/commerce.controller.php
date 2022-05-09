<?php

class ControllerCommerce{

    public static function selectTemplate(){

        $table = "template";

        $response = ModelCommerce::selectTemplate($table);

        return $response;
    }

}