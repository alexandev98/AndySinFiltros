<?php

class Connection{

        static public function connect(){

                $link=new PDO("mysql:host=localhost;dbname=dbandysinfiltros",
                        "root",
                        "1998*",
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        return $link;


        }

}