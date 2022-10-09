<?php

require_once "connection.php";

class ModelBlog{

	// SHOW POSTS
    public static function showPosts($table, $order, $item, $value){

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

	// SHOW INFO POST
    public static function showInfoPost($table, $item, $value){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = ?");

        $stmt->bindValue(1, $value);

        $stmt->execute();

        return $stmt -> fetch();

        $stmt->close();

        $stmt = null;
    }

	public static function updatePosts($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
		
	}


}