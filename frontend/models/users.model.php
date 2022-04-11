<?php

require_once "connection.php";

class UserModel{

    static public function registerUser($table, $data){


        $stmt = Connection::connect()->prepare("INSERT INTO $table(name, email, password, mode, photo, verification, emailCrypt) 
            VALUES (:name, :email, :password, :mode, :photo, :verification, :emailCrypt)");

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":mode", $data["mode"], PDO::PARAM_STR);
        $stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);
        $stmt->bindParam(":verification", $data["verification"], PDO::PARAM_INT);
        $stmt->bindParam(":emailCrypt", $data["emailCrypt"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }

    static public function showUser($table, $item, $value){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;

    }

    static public function updateUser($table, $id, $item, $value){

        $stmt = Connection::connect()->prepare("UPDATE $table SET $item = :$item WHERE id = :id");

        $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

    
        $stmt->close();
        $stmt = null;

    }

    static public function updateProfile($table, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, password = :password, photo = :photo WHERE id = :id");

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }

    static public function showPurchases($table, $item, $value){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;

    }

    public static function showCommentsProfile($table, $data){

		if($data["idUser"] != ""){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE id_user = :id_user AND id_product = :id_product");

			$stmt -> bindParam(":id_user", $data["idUser"], PDO::PARAM_INT);
			$stmt -> bindParam(":id_product", $data["idProduct"], PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE id_product = :id_product ORDER BY Rand()");

			$stmt -> bindParam(":id_product", $data["idProduct"], PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

    static public function updateComment($table, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET calification = :calification, comment = :comment WHERE id = :id");

        $stmt->bindParam(":calification", $data["calification"], PDO::PARAM_STR);
        $stmt->bindParam(":comment", $data["comment"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }


}