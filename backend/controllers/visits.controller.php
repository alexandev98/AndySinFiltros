<?php

class ControllerVisits{

    public static function showTotalVisits(){

        $table = "visitscountry";

        $response = ModelVisit::showTotalVisits($table);

        return $response;
    }
}