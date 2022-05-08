<?php

class ControllerProducts{

    public static function showTotalProducts($order){

        $table = "products";

        $response = ModelProducts::showTotalProducts($table, $order);

        return $response;




    }
}