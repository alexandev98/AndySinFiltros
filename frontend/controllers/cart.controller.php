<?php

class CarController{

    public function showRates(){

        $table = "commerce";

        $response = CartModel::showRates();

        return $response;
    }

}