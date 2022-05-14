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

    public static function updateOrdenSlide($data){

		$table = "slide";

		$response = ModelSlide::updateOrdenSlide($table, $data);

		return $response;

	}

    static public function updateSlide($data){

		$table = "slide";
		$route1 = null;
		$route2 = null;

		/*=============================================
		SI HAY CAMBIO DE FONDO
		=============================================*/	

		if($data["uploadBackground"] != null){

			/*=============================================
			BORRAMOS EL ANTIGUO FONDO DEL SLIDE
			=============================================*/	

			if($data["imgBackground"] != "views/img/slide/default/fondo.jpeg"){	

				unlink("../".$data["imgBackground"]);

			}

			/*=============================================
			CREAMOS EL DIRECTORIO SI NO EXISTE
			=============================================*/	

			$directorio = "../views/img/slide/slide".$data["id"];

			if(!file_exists($directorio)){

				mkdir($directorio, 0755);

			}

			/*=============================================
			CAPTURAMOS EL ANCHO Y ALTO DEL FONDO DEL SLIDE
			=============================================*/

			list($ancho, $alto) = getimagesize($data["uploadBackground"]["tmp_name"]);	

			$nuevoAncho = 1600;
			$nuevoAlto = 520;

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			if($data["uploadBackground"]["type"] == "image/jpeg"){

				$route1 = $directorio."/fondo.jpg";

				$origen = imagecreatefromjpeg($data["uploadBackground"]["tmp_name"]);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $route1);
		
			}

			if($data["uploadBackground"]["type"] == "image/png"){

				$route1 = $directorio."/fondo.png";

				$origen = imagecreatefrompng($data["uploadBackground"]["tmp_name"]);

				imagealphablending($destino, FALSE);
    			
    			imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $route1);
		
			}


			$rutaFondo = substr($route1, 3);

		}else{

			$rutaFondo = $data["imgBackground"];

		}

		/*=============================================
		SI HAY CAMBIO DE PRODUCTO
		=============================================*/		

		if($data["uploadImgProduct"] != null){

			/*=============================================
			CREAMOS EL DIRECTORIO SI NO EXISTE
			=============================================*/		

			$directorio = "../views/img/slide/slide".$data["id"];

			if(!file_exists($directorio)){

				mkdir($directorio, 0755);

			}

			/*=============================================
			CAPTURAMOS EL ANCHO Y ALTO DE LA IMAGEN DEL PRODUCTO
			=============================================*/		

			list($ancho, $alto) = getimagesize($data["uploadImgProduct"]["tmp_name"]);

			$nuevoAncho = 600;
			$nuevoAlto = 600;

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			if($data["uploadImgProduct"]["type"] == "image/jpeg"){

				$route2 = $directorio."/producto.jpg";

				$origen = imagecreatefromjpeg($data["uploadImgProduct"]["tmp_name"]);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $route2);
		
			}

			if($data["uploadImgProduct"]["type"] == "image/png"){

				$route2 = $directorio."/producto.png";

				$origen = imagecreatefrompng($data["uploadImgProduct"]["tmp_name"]);

				imagealphablending($destino, FALSE);
    			
    			imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $route2);
		
			}

			$rutaProducto = substr($route2, 3);

		}else{

			$rutaProducto = $data["imgProduct"];

		}

		$response = ModelSlide::updateSlide($table, $rutaFondo, $data);

		return $response;

	}

}