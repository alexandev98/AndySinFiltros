<?php

class CarController{

    public function showRates(){

        $response = CartModel::showRates();

        return $response;
    }

    public static function newPurchases($data){

        $table = "purchases";

        $response = CartModel::newPurchases($table, $data);

        return $response;
    }

}