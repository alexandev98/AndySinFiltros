<?php

require_once "connection.php";

class ModelCommerce{

    public static function selectTemplate($table){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    public static function updateLogoIcon($table, $item, $value){

        $stmt = Connection::connect()->prepare("UPDATE $table SET $item = :$item WHERE id = 1");

        $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

    
    public static function updateColors($table, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET topBar = :topBar, topText = :topText, colorBackground = :colorBackground, colorText = :colorText WHERE id = 1");

        $stmt -> bindParam(":topBar", $data["topBar"], PDO::PARAM_STR);
        $stmt -> bindParam(":topText", $data["topText"], PDO::PARAM_STR);
        $stmt -> bindParam(":colorBackground", $data["colorBackground"], PDO::PARAM_STR);
        $stmt -> bindParam(":colorText", $data["colorText"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

    public static function updateScript($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET apiFacebook = :apiFacebook, pixelFacebook = :pixelFacebook, googleAnalytics = :googleAnalytics WHERE id = 1");

		$stmt->bindParam(":apiFacebook", $data["apiFacebook"], PDO::PARAM_STR);
		$stmt->bindParam(":pixelFacebook", $data["pixelFacebook"], PDO::PARAM_STR);
		$stmt->bindParam(":googleAnalytics", $data["googleAnalytics"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

    public static function selectCommerce($table){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    public static function updateInfo($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET tax = :tax,
		modePaypal = :modePaypal, clientPaypal = :clientPaypal, keySecretPaypal = :keySecretPaypal WHERE id = 2");

		$stmt->bindParam(":tax", $data["tax"], PDO::PARAM_STR);
		$stmt->bindParam(":modePaypal", $data["modePaypal"], PDO::PARAM_STR); 
		$stmt->bindParam(":clientPaypal", $data["clientPaypal"], PDO::PARAM_STR); 
		$stmt->bindParam(":keySecretPaypal", $data["keySecretPaypal"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}





}