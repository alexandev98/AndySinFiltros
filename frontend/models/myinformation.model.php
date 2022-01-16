<?php

require_once "connection.php";

class MyInformationModel{

    static public function showInformation($table){
        $stmt=Connection::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetch();

        $stmt->close();
        $stmt=null;
    }


}