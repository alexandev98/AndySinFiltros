<?php

require_once "connection.php";

class UserModel{

    static public function registerUser($table, $data){


        $stmt = Connection::connect()->prepare("INSERT INTO $table(name, email, password, mode, verification, emailCrypt) 
            VALUES (:name, :email, :password, :mode, :verification, :emailCrypt)");

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":mode", $data["mode"], PDO::PARAM_STR);
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

        $stmt->bindParam(":".$item, $value, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

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