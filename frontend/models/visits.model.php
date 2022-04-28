<?php

require_once "connection.php";

class ModelVisit{

    public static function saveIp($table, $ip, $country, $visit){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(ip, country, visits) VALUES (:ip, :country, :visit)");

        $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
        $stmt->bindParam(":country", $ip, PDO::PARAM_STR);
        $stmt->bindParam(":visit", $ip, PDO::PARAM_INT);

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

    }

    public static function selectCountry($table, $country){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE country = :country");

        $stmt->bindParam(":country", $country, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt -> fetch();

        $stmt -> close();

    }

    public static function saveCountry($table, $country, $quantity){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(country, quantity) VALUES (:country, :quantity)");

        $stmt->bindParam(":country", $country, PDO::PARAM_STR);
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

        $stmt = Connection::connect()->prepare("UPDATE $table SET quantity = :quantity WHERE country = :country");

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