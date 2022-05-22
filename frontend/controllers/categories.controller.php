<?php

class CategoryController{

    // SHOW PRODUCTS
    public static function showCategories($item, $value){

        $table = "categories";

        $response = CategoryModel::showCategories($table, $item, $value);

        return $response;

    }

}