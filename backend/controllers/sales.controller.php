<?php

class ControllerSales{

    public static function showTotalSales(){

        $table = "purchases";

        $response = ModelSales::showTotalSales($table);

        return $response;
    }
}