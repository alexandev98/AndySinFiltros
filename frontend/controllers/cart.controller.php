<?php

class CartController{

    public static function showRates(){

        $table = "commerce";

        $response = CartModel::showRates($table);

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