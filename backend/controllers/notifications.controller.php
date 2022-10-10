<?php

class ControllerNotifications{

	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	public static function showNotifications(){

		$tabla = "notifications";

		$respuesta = ModelNotifications::showNotifications($tabla);

		return $respuesta;

	}

}