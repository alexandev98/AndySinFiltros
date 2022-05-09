<?php

require_once "connection.php";

class ModelVisit{

    public static function saveIp($table, $ip, $country, $visit){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(ip, country, visits) VALUES (:ip, :country, :visit)");

        $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
        $stmt->bindParam(":country", $country, PDO::PARAM_STR);
        $stmt->bindParam(":visit", $visit, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }

    public static function selectIp($table, $ip){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE ip = :ip");

        $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

    public static function selectCountry($table, $country){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE country = :country");

        $stmt->bindParam(":country", $country, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;

    }

    public static function saveCountry($table, $country, $code, $quantity){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(country, code, quantity) VALUES (:country, :code, :quantity)");

        $stmt->bindParam(":country", $country, PDO::PARAM_STR);
        $stmt->bindParam(":code", $code, PDO::PARAM_STR);
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    public static function updateCountry($tableCountry, $country, $quantity){

        $stmt = Connection::connect()->prepare("UPDATE $tableCountry SET quantity = :quantity WHERE country = :country");

        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $stmt->bindParam(":country", $country, PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }



}