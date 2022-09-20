<?php

require_once "connection.php";

class ModelProducts{

    public static function showTotalProducts($table, $order){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
        
    }

    public static function showSumSales($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(sales) as total FROM $table");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
        
    }

    public static function showProducts($table, $item, $value){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

    public static function updateProducts($tabla, $item1, $valor1, $item2, $valor2){

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


	/*=============================================
	CREAR ASESORIA
	=============================================*/

	public static function crearAsesoria($tabla, $datos){

		$stmt = Connection::connect()->prepare("INSERT INTO $tabla(id_category, route, state, title, description, details, price, hour, front, offer, offerPrice, discountOffer) VALUES (:id_category, :route, :state, :title, :description, :details, :price, :hour, :front, :offer, :offerPrice, :discountOffer)");

		$stmt->bindParam(":id_category", $datos["idCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":route", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":details", $datos["detalles"], PDO::PARAM_STR);
		$stmt->bindParam(":price", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":hour", $datos["hour"], PDO::PARAM_STR);
		$stmt->bindParam(":front", $datos["imgFotoPrincipal"], PDO::PARAM_STR);
		$stmt->bindParam(":offer", $datos["oferta"], PDO::PARAM_STR);
		$stmt->bindParam(":offerPrice", $datos["precioOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":discountOffer", $datos["descuentoOferta"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	
	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	public static function editProduct($tabla, $datos){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET route = :route, state = :state, title = :title, description = :description, hour = :hour, details = :details, price = :price, front = :front, offer = :offer, offerPrice = :offerPrice, discountOffer = :discountOffer WHERE id = :id");

		
		$stmt->bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $datos["state"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["title"], PDO::PARAM_STR);
		//$stmt->bindParam(":titular", $datos["titular"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $datos["description"], PDO::PARAM_STR);
		//$stmt->bindParam(":multimedia", $datos["multimedia"], PDO::PARAM_STR);
		$stmt->bindParam(":hour", $datos["hour"], PDO::PARAM_STR);
		$stmt->bindParam(":details", $datos["details"], PDO::PARAM_STR);
		$stmt->bindParam(":price", $datos["price"], PDO::PARAM_STR);
		$stmt->bindParam(":front", $datos["imgFotoPrincipal"], PDO::PARAM_STR);
		$stmt->bindParam(":offer", $datos["offer"], PDO::PARAM_STR);
		$stmt->bindParam(":offerPrice", $datos["offerPrice"], PDO::PARAM_STR);
		$stmt->bindParam(":discountOffer", $datos["discountOffer"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
			

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR ASESORIA
	=============================================*/

	public static function eliminarAsesoria($tabla, $datos){

		$stmt = Connection::connect()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}