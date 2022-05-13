<?php

class ControllerSlide{

    public static function showSlide(){

        $table = "slide";

        $response = ModelSlide::showSlide($table);

        return $response;
    }

    public static function createSlide($data){

		$table = "slide";

		$getSlide = ModelSlide::showSlide($table);

		foreach ($getSlide as $key => $value) {
			
		}

		$orden = $value["orden"] + 1;

		$response = ModelSlide::createSlide($table, $data, $orden);

		return $response;

	}

}