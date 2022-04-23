<?php

class ControllerTemplate{

    public function template(){
        include "views/template.php";
    }

    public static function styleTemplate(){

		$table = "template";

		$response = TemplateModel::styleTemplate($table);

		return $response;
	}

    public static function getHeaders($route){

		$table = "open_graph";

		$response = TemplateModel::getHeaders($table, $route);

		return $response;
	}


}