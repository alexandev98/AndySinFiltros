<?php

class ControllerCommerce{

    public static function selectTemplate(){

        $table = "template";

        $response = ModelCommerce::selectTemplate($table);

        return $response;
    }

    public static function updateLogoIcon($item, $value){

        $table = "template";

        $template = ModelCommerce::selectTemplate($table);

        $newValue = $value;

        if(isset($value["tmp_name"])){

            list($ancho, $alto) = getimagesize($value["tmp_name"]);

            if($item == "logo"){

                unlink("../".$template["logo"]);

                $newWidth = 500;
                $newHeight = 100;

                $destino = imagecreatetruecolor($newWidth, $newHeight);

                if($value["type"] == "image/jpeg"){

                    $route = "../views/img/template/logo.jpg";

                    $origen = imagecreatefromjpeg($value["tmp_name"]);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $newWidth, $newHeight, $ancho, $alto);

                    imagejpeg($destino, $route);
                }

                if($value["type"] == "image/png"){

                    $route = "../views/img/template/logo.png";

                    $origen = imagecreatefrompng($value["tmp_name"]);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $newWidth, $newHeight, $ancho, $alto);

                    imagepng($destino, $route);
                }

            }

            if($item == "icon"){

                unlink("../".$template["icon"]);

                $newWidth = 100;
                $newHeight = 100;

                $destino = imagecreatetruecolor($newWidth, $newHeight);

                if($value["type"] == "image/jpeg"){

                    $route = "../views/img/template/icono.jpg";

                    $origen = imagecreatefromjpeg($value["tmp_name"]);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $newWidth, $newHeight, $ancho, $alto);

                    imagejpeg($destino, $route);
                }

                if($value["type"] == "image/png"){

                    $route = "../views/img/template/icono.png";

                    $origen = imagecreatefrompng($value["tmp_name"]);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $newWidth, $newHeight, $ancho, $alto);

                    imagepng($destino, $route);
                }

                
                
            }

            $newValue = substr($route, 3);
        }

        $response = ModelCommerce::updateLogoIcon($table, $item, $newValue);

        return $response;
    }

    public static function updateColors($data){

        $table = "template";

        $response = ModelCommerce::updateColors($table, $data);

        return $response;
    }

    public static function updateScript($data){

		$table = "template";

		$response = ModelCommerce::updateScript($table, $data);

		return $response;

	}

    public static function selectCommerce(){

        $table = "commerce";

        $response = ModelCommerce::selectCommerce($table);

        return $response;
    }

    public static function updateInfo($data){

		$table = "commerce";

		$response = ModelCommerce::updateInfo($table, $data);

		return $response;


	}

}