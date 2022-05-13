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

		$stmt = Connection::connect()->prepare("INSERT INTO $table(imgBackground, typeSlide, styleImgProduct, title1, title2, title3, button, url, orden) VALUES (:imgBackground, :typeSlide, :styleImgProduct, :title1, :title2, :title3, :button, :url, :orden)");

		$stmt->bindParam(":imgBackground", $data["imgBackground"], PDO::PARAM_STR);
		$stmt->bindParam(":typeSlide", $data["typeSlide"], PDO::PARAM_STR); 
		$stmt->bindParam(":styleImgProduct", $data["styleImgProduct"], PDO::PARAM_STR); 
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
}