<?php

class ControllerUsers{

    public static function showTotalUsers($order){

        $table = "users";

        $response = ModelUser::showTotalUsers($table, $order);

        return $response;




    }
}