<?php

class ControllerBlog{

	// SHOW PRODUCTS
    public static function showPosts($order, $item, $value){

        $table = "blog";

        $response = ModelBlog::showPosts($table, $order, $item, $value);

        return $response;

    }

	public static function showInfoPost($item, $value){

        $table = "blog";

        $response = ModelBlog::showInfoPost($table, $item, $value);
        
        return $response;

    }

}


