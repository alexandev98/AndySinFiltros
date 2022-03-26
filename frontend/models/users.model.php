<?php

require_once "connection.php";

class UserModel{

    static public function mdlRegisterUser($table, $data){


        $stmt = Connection::connect()->prepare("INSERT INTO $table(name, email, password, mode, verification) 
            VALUES (:name, :email, :password, :mode, :verification)");

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":mode", $data["mode"], PDO::PARAM_STR);
        $stmt->bindParam(":verification", $data["verification"], PDO::PARAM_INT);

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