<?php

require_once "connection.php";

class ModelSlide{

    public static function showSlide($table){
      
        $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY orden ASC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
        
    }

    static public function createSlide($table, $data, $orden){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(imgBackground, typeSlide, styleImgProduct, styleTextSlide, title1, title2, title3, button, url, orden) VALUES (:imgBackground, :typeSlide, :styleImgProduct, :styleTextSlide, :title1, :title2, :title3, :button, :url, :orden)");

		$stmt->bindParam(":imgBackground", $data["imgBackground"], PDO::PARAM_STR);
		$stmt->bindParam(":typeSlide", $data["typeSlide"], PDO::PARAM_STR);
        $stmt->bindParam(":styleImgProduct", $data["styleImgProduct"], PDO::PARAM_STR);  
		$stmt->bindParam(":styleTextSlide", $data["styleTextSlide"], PDO::PARAM_STR); 
		$stmt->bindParam(":title1", $data["title1"], PDO::PARAM_STR);
		$stmt->bindParam(":title2", $data["title2"], PDO::PARAM_STR);
 		$stmt->bindParam(":title3", $data["title3"], PDO::PARAM_STR);
		$stmt->bindParam(":button", $data["button"], PDO::PARAM_STR);
		$stmt->bindParam(":url", $data["url"], PDO::PARAM_STR);
		$stmt->bindParam(":orden", $orden, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

    public static function updateOrdenSlide($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET orden = :orden WHERE id = :id");

		$stmt->bindParam(":orden", $data["orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

    static public function updateSlide($table, $rutaFondo, $rutaProducto, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, typeSlide = :typeSlide, styleImgProduct = :styleImgProduct, styleTextSlide = :styleTextSlide, imgBackground = :imgBackground, imgProduct = :imgProduct, title1 = :title1, title2 = :title2, title3 = :title3, button = :button, url = :url WHERE id = :id");

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":typeSlide", $data["typeSlide"], PDO::PARAM_STR);
        $stmt->bindParam(":styleImgProduct", $data["styleImgProduct"], PDO::PARAM_STR); 
        $stmt->bindParam(":styleTextSlide", $data["styleTextSlide"], PDO::PARAM_STR); 
        $stmt->bindParam(":imgBackground", $rutaFondo, PDO::PARAM_STR);
        $stmt->bindParam(":imgProduct", $rutaProducto, PDO::PARAM_STR);
        $stmt->bindParam(":title1", $data["title1"], PDO::PARAM_STR);
		$stmt->bindParam(":title2", $data["title2"], PDO::PARAM_STR); 
		$stmt->bindParam(":title3", $data["title3"], PDO::PARAM_STR);
		$stmt->bindParam(":button", $data["button"], PDO::PARAM_STR); 
		$stmt->bindParam(":url", $data["url"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;


	}

	public static function deleteSlide($table, $id){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

		
	}
}