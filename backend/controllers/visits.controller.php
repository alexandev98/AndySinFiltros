<?php

class ControllerVisits{

    public static function showTotalVisits(){

        $table = "visitscountry";

        $response = ModelVisit::showTotalVisits($table);

        return $response;
    }

    public static function showCountries($order){

        $table = "visitscountry";

        $response = ModelVisit::showCountries($table, $order);

        return $response;
    }
}