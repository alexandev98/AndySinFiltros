<?php

require_once "connection.php";

class CategoryModel{

    // SHOW PRODUCTS
    public static function showCategories($table){

        
        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
           
        $stmt->execute();
        
        return $stmt -> fetchAll();

        $stmt->close();

        $stmt = null;
    }

    
}


