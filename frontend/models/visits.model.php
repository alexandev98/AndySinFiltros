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



}