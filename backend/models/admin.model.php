<?php

require_once "connection.php";

class ModelAdministrators{

    public static function showAdministrators($table, $item, $value){

        if($item != null){

             $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt ->bindParam(":".$item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt -> fetch();

        }else{

            $stmt = Connection::connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;
    }

    /*=============================================
	EDITAR PERFIL
	=============================================*/

	public static function editarPerfil($tabla, $datos){
	
		$stmt = Connection::connect()->prepare("UPDATE $tabla SET name = :name, email = :email, password = :password, profile = :profile, photo = :photo WHERE id = :id");

		$stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":profile", $datos["profile"], PDO::PARAM_STR);
		$stmt -> bindParam(":photo", $datos["photo"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}