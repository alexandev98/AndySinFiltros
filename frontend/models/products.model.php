<?php

require_once "connection.php";

class ProductModel{

    // SHOW PRODUCTS
    public static function showProducts($table, $order, $item, $value){

        if($item != null){
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = ? ORDER BY $order DESC LIMIT 4 ");
            $stmt->bindValue(1, $value);
        }
        else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE price > 0 ORDER BY $order DESC LIMIT 4");
        }
        
        $stmt->execute();
        
        return $stmt -> fetchAll();

        $stmt->close();

        $stmt = null;
    }

    // SHOW INFO PRODUCT
    public static function showInfoProduct($table, $item, $value){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = ?");

        $stmt->bindValue(1, $value);

        $stmt->execute();

        return $stmt -> fetch();

        $stmt->close();

        $stmt = null;
    }

   
	// SHOW BANNER
	static public function showBanner($table){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}
}


