<?php

class ProductController{

    // SHOW PRODUCTS
    public static function showProducts($order, $item, $value){

        $table = "products";

        $response = ProductModel::showProducts($table, $order, $item, $value);

        return $response;

    }

    public static function showInfoProduct($item, $value){

        $table = "products";

        $response = ProductModel::showInfoProduct($table, $item, $value);
        
        return $response;

    }

	// SHOW BANNER
	static public function showBanner(){

		$table = "banner";

		$response = ProductModel::showBanner($table);

		return $response;

	}

    public static function listProducts($order, $item, $value){

        $table = "products";

        $response = ProductModel::listProducts($table, $order, $item, $value);

        return $response;

    }
    
    public static function updateProduct($item1, $value1, $item2, $value2){

		$table = "products";

		$response = ProductModel::updateProduct($table, $item1, $value1, $item2, $value2);

		return $response;

	}
}