<?php

require_once "connection.php";

class TemplateModel{

    static public function styleTemplate($table){
        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
        $stmt -> execute();
        return $stmt -> fetch();

        $stmt -> close();
    }


}