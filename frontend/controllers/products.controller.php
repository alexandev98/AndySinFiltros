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

}