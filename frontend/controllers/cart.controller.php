<?php

class CarController{

    public function showRates(){

        $response = CartModel::showRates();

        return $response;
    }

    public static function newPurchases($data){

        $table = "purchases";

        $response = CartModel::newPurchases($table, $data);

        if($response == "ok"){

            $table = "comments";
            UserModel::InputComment($table, $data);
        }

        return $response;
    }

}