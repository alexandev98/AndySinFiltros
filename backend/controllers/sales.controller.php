<?php

class ControllerSales{

    public static function showTotalSales(){

        $table = "purchases";

        $response = ModelSales::showTotalSales($table);

        return $response;
    }

    public static function showSales(){

        $table = "purchases";

        $response = ModelSales::showSales($table);

        return $response;
    }
}