<?php

class CategoryController{

    // SHOW PRODUCTS
    public static function showCategories(){

        $table = "categories";

        $response = CategoryModel::showCategories($table);

        return $response;

    }

}