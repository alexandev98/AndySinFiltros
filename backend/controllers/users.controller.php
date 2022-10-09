<?php

class ControllerUsers{

    public static function showTotalUsers($order){

        $table = "users";

        $response = ModelUser::showTotalUsers($table, $order);

        return $response;

    }

    /*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function showUsers($item, $valor){

		$tabla = "users";

		$respuesta = ModelUser::showUsers($tabla, $item, $valor);

		return $respuesta;
	
	}
}