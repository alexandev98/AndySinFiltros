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
	public static function showBanner($table, $route){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE route = :route");

		$stmt -> bindParam(":route", $route, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

    /*=============================================
	LISTAR PRODUCTOS
	=============================================*/

	public static function listProducts($table, $order, $item, $value){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY $order DESC");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

    public static function updateProduct($table, $item1, $value1, $item2, $value2){

		$stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}


