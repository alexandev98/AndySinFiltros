<?php

class ControllerProducts{

    public static function showTotalProducts($order){

        $table = "products";

        $response = ModelProducts::showTotalProducts($table, $order);

        return $response;

    }

    public static function showSumSales(){

        $table = "products";

        $response = ModelProducts::showSumSales($table);

        return $response;

    }

    public static function showProducts($item, $value){

		$table = "products";

		$response = ModelProducts::showProducts($table, $item, $value);

		return $response;
	
	}
}